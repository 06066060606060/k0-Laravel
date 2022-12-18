class Grid
{
    
    GRID_SIZE = [32,20]; //[CUSTOMISABLE]

    grid_data = null;
    grid_data_box_open = null;
    grid_id = null;
    
    i; j;

    TOTAL_GRID_SPOTS; //Auto calculated
    total_fruits; //Auto calculated

    GRID_X = 0;
    GRID_Y = 10;

    crates = [];
    fruits = [];
    
    //[CUSTOMISABLE] Total num of each fruit in full grid:
                                 //Grapes  //Strawberries  //Watermelons  //Lemons  //Pineapples  //Orange    //Banana    //Pear
    static NUM_OF_FRUITS_INITIAL = [45,       100,           29,            1,        33,         33,         4,          1];

    scene;

    constructor(scene)
    {
        this.scene = scene;
        
        this.TOTAL_GRID_SPOTS = this.GRID_SIZE[0] * this.GRID_SIZE[1];
        
        this.load_grid_data();
        
        this.generate_grid_data(this.grid_data != null);
        this.generate_crates();
    }

    generate_grid_data(override = false)
    {
        //1D array representing entire grid (640 entries in it)
        var a = [];
        //First fill it with fruits (Based on NUM_OF_FRUITS_INITIAL for each type of fruit)
        for (this.j = 0; this.j < Grid.NUM_OF_FRUITS_INITIAL.length; this.j++)
        {
            for (this.i = 0; this.i < Grid.NUM_OF_FRUITS_INITIAL[this.j]; this.i++)
            {
                a.push(this.j + 1);
            }
        }
        this.total_fruits = a.length;
        console.log("Total fruits: " + this.total_fruits);
        if (override)
        {
            return;
        }
        
        this.grid_id++;
        //Then, add 0s for remainder up to 640 entries
        const a_length_current = a.length;
        for (this.i = 0; this.i < this.TOTAL_GRID_SPOTS - a_length_current; this.i++)
        {
            a.push(0);
        }
        console.log("Non shuffled a:");
        console.log(a);
        //Then shuffle it:
        var shuffled_a = a.sort(function () { return Math.random() - 0.5;});
        console.log("Shuffled a:");
        console.log(shuffled_a);
        
        //Then convert it to 2D array + boxes open array
        this.j = 0;
        this.grid_data = [];
        this.grid_data.push([]);
        this.grid_data_box_open = [];
        this.grid_data_box_open.push([]);
        for (this.i = 0; this.i < shuffled_a.length; this.i++)
        {
            if (this.i != 0 && this.i % this.GRID_SIZE[0] == 0)
            {
                this.j++;
                this.grid_data.push([]);
                this.grid_data_box_open.push([]);
            }
            this.grid_data[this.j].push(shuffled_a[this.i]);
            this.grid_data_box_open[this.j].push(false);
        }
        console.log("2D array:");
        console.log(this.grid_data);
        console.log("2D box open array:");
        console.log(this.grid_data_box_open);
        
        
        //[DATABASE]
        //
            //Update Database values containing grid data
            this.save_grid_data();
            //It shouldn't be 1 entry for each grid index, unless you wanna keep some sort of grid log or something like that
            //Simply adjust the grid index value to match this.grid_id
        //
    }

    generate_crates()
    {
        var f_ind = 0;
        //Make crates
        for (this.i = 0; this.i < this.GRID_SIZE[1]; this.i++) //Row
        {
            for (this.j = 0; this.j < this.GRID_SIZE[0]; this.j++) 
            {
                var c;
                if (this.crates.length < this.TOTAL_GRID_SPOTS)
                {
                    c = new Crate(this.scene, this.GRID_X + this.j * 30, this.GRID_Y + this.i * 30);
                    c.setOrigin(0,0);
                    this.crates.push(c);
                    c.row = this.i;
                    c.column = this.j;
                }
                else
                {
                    c = this.crates[this.i * this.GRID_SIZE[0] + this.j];
                    c.visible = true;
                    c.crate_opened = false;
                }
                
                if (this.grid_data[this.i][this.j] != 0)
                {
                    var f;
                    if (this.fruits.length < this.total_fruits)
                    {
                        f = new Fruit(this.scene, this.GRID_X + this.j * 30 + 15, this.GRID_Y + this.i * 30 + 15, this.grid_data[this.i][this.j]);
                        this.fruits.push(f);
                    }
                    else
                    {
                        f = this.fruits[f_ind];
                        f_ind++;
                        f.x = this.GRID_X + this.j * 30 + 15;
                        f.y = this.GRID_Y + this.i * 30 + 15;
                        if (f.type != this.grid_data[this.i][this.j])
                        {
                            f.type = this.grid_data[this.i][this.j];
                            f.setTexture('Fruit' + f.type);
                            f.setDepth(c.depth + 1);
                        }
                    }
                    f.init();              
                    c.fruit = f;
                }
                else
                {
                    c.fruit = null;
                }
                
                c.crate_opened = this.grid_data_box_open[this.i][this.j];
                if (c.fruit == null)
                {
                    c.visible = !c.crate_opened;
                }
                else
                {
                    if (c.crate_opened)
                    {
                        c.fruit.alpha = 1.0;
                    }
                }
            }
        }
    }

    update()
    {
        for (this.i = 0; this.i < this.fruits.length; this.i++)
        {
            this.fruits[this.i].update();
        }
    }

    //Database
    //
        can_acquire_new_grid_database()
        {
            //Return true if grid with index of >(this.grid.grid_index) is available in Database, otherwise return false
            //This is called when another player's click uncovers the top win fruit
            //The phaser part generates a new grid only on view of player who uncovered it
            //That is then stored in the database. The other players would have value of grid_index that is 1 less
            //So when a database value of a higher index is confirmed, can proceed with loading database data for new grid layout
            //Note: You can also mix this with a socket emit event trigger if you want, though not necesarry
            var database_index = this.grid_index + 1; //replace this.grid_index + 1 with database grid index fetching
            return (database_index > this.grid_index);
        }

        save_grid_data()
        {
            //Store new grid data in database
            //this.grid_data, this.grid_data_box_open, this.grid_id
        }

        load_grid_data()
        {
            //Grid is 2D array precisely matching the layout of the grid with crates
            //2nd array has the exact same layout, but each value is either true/false 
            //denoting if crate has been opened or not
            //Also there's grid index. With each new grid it increases by 1. Make sure to assign this.grid_id to match it
            //This is used for checking if a received click transmission is for the same grid
            //(In case highest value fruit is pressed and new grid is generated, but let's say some player has slow 
            //connection and there is latency, so by the time their click registers a new grid is already generated)

            //Also, check if there is a generated grid in database first, then assign values accordingly
            //If not set this.grid_data to value null.
            //If it's null, after this function a new grid will generate

            //Placeholder (Put database values here)
            this.grid_data =
            [
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], 
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 1, 2, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],  
             [0, 0, 0, 0, 0, 1, 2, 3, 4, 5, 6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
            ];
            this.grid_data_box_open =
            [
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false],  
             [false, true, false, true, false, false, true, true, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, false]
            ];
            this.grid_id = 5;
        }
    //
    
}
