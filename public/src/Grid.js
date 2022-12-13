class Grid
{
    
    GRID_SIZE = [32,20];
    grid_data;
    i; j;

    TOTAL_GRID_SPOTS = 640; //32x20

    GRID_X = 0;
    GRID_Y = 10;
                            //Grapes  //Strawberries  //Watermelons  //Lemons  //Pineapples  //Orange    //Banana    //Pear
    NUM_OF_FRUITS_INITIAL = [45,       100,           29,            1,        33,           33,         4,          33];

    scene;

    constructor(scene)
    {
        this.scene = scene;
        this.generate_grid_data();
        //Make crates
        for (this.i = 0; this.i < this.GRID_SIZE[1]; this.i++) //Row
        {
            for (this.j = 0; this.j < this.GRID_SIZE[0]; this.j++) 
            {
                var c = new Crate(scene, this.GRID_X + this.j * 30, this.GRID_Y + this.i * 30, this.i, this.j);
                c.setOrigin(0,0);
                if (this.grid_data[this.i][this.j] != 0)
                {
                    var f = new Fruit(scene, this.GRID_X + this.j * 30 + 15, this.GRID_Y + this.i * 30 + 15, this.grid_data[this.i][this.j]);
                    f.setScale(0.75);
                    c.fruit = f;
                }
            }
        }
    }

    generate_grid_data()
    {
        //1D array representing entire grid (640 entries in it)
        var a = [];
        //First fill it with fruits (Based on NUM_OF_FRUITS_INITIAL for each type of fruit)
        for (this.j = 0; this.j < this.NUM_OF_FRUITS_INITIAL.length; this.j++)
        {
            for (this.i = 0; this.i < this.NUM_OF_FRUITS_INITIAL[this.j]; this.i++)
            {
                a.push(this.j + 1);
            }
        }
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
        //Then convert it to 2D array:
        this.j = 0;
        this.grid_data = [];
        this.grid_data.push([]);
        for (this.i = 0; this.i < shuffled_a.length; this.i++)
        {
            if (this.i != 0 && this.i % this.GRID_SIZE[0] == 0)
            {
                this.j++;
                this.grid_data.push([]);
            }
            this.grid_data[this.j].push(shuffled_a[this.i]);
        }
        console.log("2D array:");
        console.log(this.grid_data);
    }
    
}
