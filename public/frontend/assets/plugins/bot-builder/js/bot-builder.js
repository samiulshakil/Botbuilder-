(function ($) {
    $(document).ready(function(){
        (function(){
            let downloadButton = document.querySelector(".download-btn");
            let customBotPreviewImage = document.querySelector(".custom-bot-preview-image");

            let boyBotImageSize = {
                width: document.querySelector("#boy_body").naturalWidth,
                height: document.querySelector("#boy_body").naturalHeight,
            };

            let girlBotImageSize = {
                width: document.querySelector("#girl_body").naturalWidth,
                height: document.querySelector("#girl_body").naturalHeight,
            };

            /* Get each canvas elements */
            let boyBotcanvas = document.querySelector("#boy-bot-canvas");
            let girlBotcanvas = document.querySelector("#girl-bot-canvas");

            /* Created empty array from selected images */
            var boyBotImagesArray = [];
            var girlBotImagesArray = [];


            /* Fix canvas size according to Bot images size */
            $("#boy-bot-canvas").attr({
                "width": boyBotImageSize.width,
                "height": boyBotImageSize.height,
            });

            $("#girl-bot-canvas").attr({
                "width": girlBotImageSize.width,
                "height": girlBotImageSize.height,
            });
            
            /* Boy bot apply button functions */
            $(".customization__wrapper--boy .apply-btn").on("click", function(){
                emptyData();
                boyBotImagesArray = [];
                var arrBoy = Array.from(document.querySelectorAll(".customization__wrapper--boy .customization__character .customization__character__image"));

                arrBoy.forEach(element=>{
                    boyBotImagesArray.push({ uri: element.getAttribute("src"), x: 0, y:  0, sw: boyBotImageSize.width, sh: boyBotImageSize.height })
                });

                downloadBoyBot();
			});

            /* Girl bot apply button functions */
            $(".customization__wrapper--girl .apply-btn").on("click", function(){
                emptyData();
                girlBotImagesArray = [];
                var arrGirl = Array.from(document.querySelectorAll(".customization__wrapper--girl .customization__character .customization__character__image"));

                arrGirl.forEach(element=>{
                    girlBotImagesArray.push({ uri: element.getAttribute("src"), x: 0, y:  0, sw: girlBotImageSize.width, sh: girlBotImageSize.height })
                });

                downloadGirlBot();
			});


            function downloadBoyBot(){
                let getContext = () => boyBotcanvas.getContext('2d');
    
                // It's better to use async image loading.
                let loadImage = url => {
                    return new Promise((resolve, reject) => {
                        const img = new Image();
                        img.onload = () => resolve(img);
                        img.onerror = () => reject(new Error(`load ${url} fail`));
                        img.src = url;
                    });
                };
    
                // Here, I created a function to draw image.
                const depict = options => {
                    const ctx = getContext();
                    const myOptions = Object.assign({}, options);
                    return loadImage(myOptions.uri).then(img => {
                        ctx.drawImage(img, myOptions.x, myOptions.y, myOptions.sw, myOptions.sh);
                        downloadButton.setAttribute("href", boyBotcanvas.toDataURL('image/png'));
                        customBotPreviewImage.setAttribute("src", boyBotcanvas.toDataURL('image/png'));
                    })
                };
                boyBotImagesArray.forEach(depict);
            }

            function downloadGirlBot(){
                const getContext = () => girlBotcanvas.getContext('2d');
    
                // It's better to use async image loading.
                const loadImage = url => {
                    return new Promise((resolve, reject) => {
                        const img = new Image();
                        img.onload = () => resolve(img);
                        img.onerror = () => reject(new Error(`load ${url} fail`));
                        img.src = url;
                    });
                };
    
                // Here, I created a function to draw image.
                const depict = options => {
                    const ctx = getContext();
                    const myOptions = Object.assign({}, options);
                    return loadImage(myOptions.uri).then(img => {
                        ctx.drawImage(img, myOptions.x, myOptions.y, myOptions.sw, myOptions.sh);
                        downloadButton.setAttribute("href", girlBotcanvas.toDataURL());
                        customBotPreviewImage.setAttribute("src", girlBotcanvas.toDataURL());
                    })
                };
                girlBotImagesArray.forEach(depict);
            }

            $(".clear-btn").on("click", function(){
                emptyData();
            })
            

            function emptyData(){
                boyBotcanvas.getContext('2d').clearRect(0, 0, boyBotImageSize.width, boyBotImageSize.height);
                girlBotcanvas.getContext('2d').clearRect(0, 0, girlBotImageSize.width, girlBotImageSize.height);
                downloadButton.setAttribute("href", "#!");
                customBotPreviewImage.setAttribute("src", "./assets/images/preloader/preloader.gif");
            }
            
		})();
    });
})(jQuery);