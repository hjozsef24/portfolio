import $ from 'jquery'
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

const fancyBox = () => {
    if($(window).width() < 1200){
        return;
    }

    Fancybox.bind("[data-fancybox]", {
    Thumbs: {
        type: "classic",
    },
    Toolbar: {
        display: {
            right: ["close"],
        },
    },
    });
}

export default fancyBox;