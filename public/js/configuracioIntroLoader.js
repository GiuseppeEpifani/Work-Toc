
$("#element").introLoader({
    animation: {
        name: 'simpleLoader', //nombre de la animación
        options: {
            exitFx: 'slideRight', //efecto de salida de la animación
            ease: "easeOutSine",
            delayBefore: 1000, //tiempo en ms que dura la animación, luego de que se cargó la página
            exitTime: 300 //tiempo en ms que dura la animación de salida                   
        }
    },
    spinJs: {
        lines: 13, // The number of lines to draw
        length: 20, // The length of each line
        width: 10, // The line thickness
        radius: 30, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        color: '#85bb65', // #rgb or #rrggbb or array of colors
    }
});



