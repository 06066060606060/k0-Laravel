class GameplayScene extends Phaser.Scene
{
    
    grid;
    crates = [];
    points_acquired_in_session = 0;
    points_text;
    smoke_effects = [];
    smoke_effects_pool = [];
    i;

    constructor()
    {
        super('GS');
    }

    preload()
    {
        this.load.image('Crate', 'assets/CrateThingy.png');
        this.load.image('Smoke', 'assets/SmokeThingy0001.png');
        this.load.image('SideMenu', 'assets/SideMenu.png');
        this.load.image('Fruit1', 'assets/grapes_purple.png');
        this.load.image('Fruit2', 'assets/strawberry.png');
        this.load.image('Fruit3', 'assets/watermelon.png');
        this.load.image('Fruit4', 'assets/lemon.png');
        this.load.image('Fruit5', 'assets/pineapple.png');
        this.load.image('Fruit6', 'assets/orange.png');
        this.load.image('Fruit7', 'assets/banana.png');
        this.load.image('Fruit8', 'assets/pear.png');
    }

    create()
    {   
        this.grid = new Grid(this);
        var side_menu = this.add.image(960, -50, 'SideMenu');
        side_menu.setOrigin(0,0);
        this.points_text = this.add.text(50, 612, "Session Points:", { fontFamily: 'Arial', fontSize: '22px', fill: '#FFFFFF' });
    }
    
    
    update()
    {  
        for (this.i = 0; this.i < this.smoke_effects.length; this.i++)
        {
            this.smoke_effects[this.i].update();
        }
    }

    score_increase(inc)
    {
        this.points_acquired_in_session += inc;
        this.points_text.text = "Session Points: " + this.points_acquired_in_session;
     
    }

    make_new_smoke_effect(x, y)
    {
        var se;
        if (this.smoke_effects_pool.length == 0)
        {
            se = new Smoke(this, x, y);
        }
        else
        {
            se = this.smoke_effects_pool[0];
            this.smoke_effects_pool.splice(0, 1);
            se.x = x;
            se.y = y;
        }
        se.init();
        this.smoke_effects.push(se);
        console.log(this.smoke_effects);
        console.log(this.smoke_effects_pool);
    }

    pool_smoke_effect(instance)
    {
        this.smoke_effects_pool.push(instance);
        this.smoke_effects.splice(this.smoke_effects.indexOf(instance), 1);
        console.log(this.smoke_effects);
        console.log(this.smoke_effects_pool);
    }

}
