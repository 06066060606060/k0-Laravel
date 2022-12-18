class ObjectPooling
{
    
    smoke_effects_pool = [];
    scene;

    constructor(scene)
    {
        this.scene = scene;
    }

    get_a_smoke_effect(x, y)
    {
        var se;
        if (this.smoke_effects_pool.length == 0)
        {
            se = new Smoke(this.scene, x, y);
        }
        else
        {
            se = this.smoke_effects_pool[0];
            this.smoke_effects_pool.splice(0, 1);
            se.x = x;
            se.y = y;
        }
        return se;
    }

    pool_smoke_effect(instance)
    {
        this.smoke_effects_pool.push(instance);
        this.scene.smoke_effects.splice(this.scene.smoke_effects.indexOf(instance), 1);
        //console.log(this.scene.smoke_effects);
        //console.log(this.smoke_effects_pool);
    }

}