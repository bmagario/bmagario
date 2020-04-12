particlesJS("my-particles", {
  "particles": {
    "number": {
      "value": 128,
        "density": {
        "enable": true,
          "value_area": 1262.6362266116362
      }
    },
    "color": {
      "value": "#501e1e"
    },
    "shape": {
      "type": "star",
        "stroke": {
        "width": 0,
          "color": "#641212"
      },
      "polygon": {
        "nb_sides": 11
      },
      "image": {
        "src": "img/github.svg",
          "width": 100,
            "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
        "random": true,
          "anim": {
        "enable": false,
          "speed": 1,
            "opacity_min": 0.1,
              "sync": false
      }
    },
    "size": {
      "value": 0,
        "random": true,
          "anim": {
        "enable": false,
          "speed": 40,
            "size_min": 0.1,
              "sync": false
      }
    },
    "line_linked": {
      "enable": true,
        "distance": 208.44356791251798,
          "color": "#ffffff",
            "opacity": 0.20844356791251797,
              "width": 0
    },
    "move": {
      "enable": true,
        "speed": 6,
          "direction": "none",
            "random": true,
              "straight": false,
                "out_mode": "bounce",
                  "bounce": false,
                    "attract": {
        "enable": true,
          "rotateX": 600,
            "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
      "events": {
      "onhover": {
        "enable": true,
          "mode": "repulse"
      },
      "onclick": {
        "enable": true,
          "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
          "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
          "size": 40,
            "duration": 2,
              "opacity": 8,
                "speed": 3
      },
      "repulse": {
        "distance": 200,
          "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});