$(document).ready(function () {
            $('.quake-slider').quake({
                thumbnails: true,
                animationSpeed: 500,
                applyEffectsRandomly: true,
                navPlacement: 'inside',
                navAlwaysVisible: true,
                captionOpacity: '0.3',
                captionsSetup: [
                                 {
                                     "orientation": "top",
                                     "slides": [0, 1],
                                     "callback": captionAnimateCallback
                                 },
                                  {
                                      "orientation": "left",
                                      "slides": [2, 3],
                                      "callback": captionAnimationCallback1
                                  }
                                  ,
                                  {
                                      "orientation": "bottom",
                                      "slides": [4, 5],
                                      "callback": captionAnimateCallback
                                  }
                                  ,
                                  {
                                      "orientation": "right",
                                      "slides": [6, 7],
                                      "callback": captionAnimationCallback1
                                  }
                                ]

            });

            function captionAnimateCallback(captionWrapper, captionContainer, orientation) {
                captionWrapper.css({ left: '-990px' }).stop(true, true).animate({ left: 0 }, 500);
                captionContainer.css({ left: '-990px' }).stop(true, true).animate({ left: 0 }, 500);
            }
            function captionAnimationCallback1(captionWrapper, captionContainer, orientation) {
                captionWrapper.css({ top: '-330px' }).stop(true, true).animate({ top: 0 }, 500);
                captionContainer.css({ top: '-330px' }).stop(true, true).animate({ top: 0 }, 500);
            }
});