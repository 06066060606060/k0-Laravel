class WelcomeScreenButton extends CustomButton {
    constructor(scene, x, y, button_text) {
        super(scene, x, y, "Button", button_text);

        this.alpha_transparent = 0.8;

        this.alpha = this.alpha_transparent;

        //this.hover_tint = 0xCCAACC;

        //Colour values for first 2 buttons in Welcome Screen Panel:

        this.base_tint = 0x5555ff;

        this.hover_tint = 0xcc55ff;

        switch (this.button_text) {
        case "Play in Free Mode":
            this.button_text_x_off_set = 22;

            break;

        case GlobalAttributes.SPINS_WON_FOR_1_STAR + " Games for 1 Star":
            this.button_text_x_off_set = 9;

            break;

        default:
            this.button_text_x_off_set = 35;
        }
    }

    clicked() {
        var sound_a = true;

        //Case values need to match text strings

        switch (this.button_text) {
            case "Play in Free Mode": {
                console.log("Play in Free Mode clicked");
                if (this.parentContainer.status == "Idle") {
                this.parentContainer.hide_panel_init();
                }

                break;
            }

            case GlobalAttributes.SPINS_WON_FOR_1_STAR + " Games for 1 Star": {
                console.log("Game for 1 star clicked");
                if (UserData.stars > 0) {

                    UserData.change_stars(-1);

                    Socketting.add_parties_for_stars(
                        15 /* nbr of parties*/,
                        1 /* nbr of stars*/
                    );

                    this.scene.refresh_stars_text();

                    this.scene.refresh_clicks_text();

                    $.ajax({
                        headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        "Content-Type": "application/json",
                        },
                        url: "https://gokdo.com/api/scores",
                        //url: 'http://127.0.0.1:8000/api/scores',
                        method: "POST",
                        data: JSON.stringify({
                        user_id: UserData.user_id,
                        trophee2: -5,
                        parties: 10,
                        }),
                        error: function (error) {
                        console.log(error);
                        },
                    });
                }
                else {
                    sound_a = false;
                }

                break;
            }

            default: {
                var additional_url = "/";

                var url = "https://gokdo.com/pack" + additional_url;

                GlobalFunctions.open_url(url);
            }
        }

        super.clicked(sound_a);
    }
}
