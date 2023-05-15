class Grid
{
    
    GRID_SIZE = [32,20]; //[CUSTOMISABLE]

    grid_data = null;
    grid_data_box_open = null;
    grid_id = 1;

    TOTAL_GRID_SPOTS; //Auto calculated
    total_fruits = null; //Auto calculated

    GRID_X = 0;
    GRID_Y = 10;

    crates = [];
    fruits = [];
    
    //[CUSTOMISABLE] Total num of each fruit in full grid:
                                 //Grapes  //Strawberries  //Watermelons  //Lemons  //Pineapples  //Orange    //Banana    //Pear
    static NUM_OF_FRUITS_INITIAL = [45,       100,           29,            1,        33,         33,         4,          1];

    scene;

    static this_instance;

    i; j;

    constructor(scene)
    {
        this.scene = scene;
        
        this.TOTAL_GRID_SPOTS = this.GRID_SIZE[0] * this.GRID_SIZE[1];
        
        Grid.this_instance = this;
    }

    generate_grid_data(override = false)
    {
        if (override && this.total_fruits != null)
        {
            return;
        }
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
        
        //[Socket]
        //
            this.save_grid_data();
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
                    c.visible = true;
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

    //Socket
    //
        save_grid_data()
        {
            Socketting.transmit_grid_data_to_server();
        }

        static load_grid_data(data)
        {
            Grid.this_instance.grid_data = data.grid_data;
            Grid.this_instance.grid_data_box_open = data.grid_data_box_open;
            Grid.this_instance.grid_id = data.grid_id;
            
            Grid.this_instance.generate_grid_data(Grid.this_instance.grid_data != null);
            Grid.this_instance.generate_crates();
            Grid.this_instance.scene.timer_make_new_grid = 555;
        }
    //
    
}
