$(document).ready(function () {
    var slide = document.getElementsByClassName('imageslider');//取得幻燈片的htmlcollection物件
    var SlideDelayNumber = 0;
    var SlideTotalNumber = 0;
    var SlideFirstNumber = 0;
    var SlideMiddleNumber = 0;
    var SlideLastNumber = 0;
    [].forEach.call(slide, function (el) {//取得幻燈片的html物件
        var a = el.getElementsByTagName('a');//取得幻燈片內各別項目的htmlcollection物件
        SlideDelayNumber = (a.length - 1) * 5;//計算總共需要的animation延遲秒數
        SlideTotalNumber = a.length * 5;//animation需要的秒數
        SlideFirstNumber = 1 / SlideTotalNumber * 100;//計算animation淡入需要的設定值
        SlideMiddleNumber = 5 / SlideTotalNumber * 100;//計算animation顯示需要的設定值
        SlideLastNumber = 6 / SlideTotalNumber * 100;//計算animation淡出需要的設定值
        //在head裡面建立style標籤
        var style = (function () {
            // Create the <style> tag
            var style = document.createElement("style");

            // WebKit hack
            style.appendChild(document.createTextNode(""));

            // Add the <style> element to the page
            document.head.appendChild(style);

            console.log(style.sheet.cssRules); // length is 0, and no rules

            return style;
        })();
        //在style標籤內建立animation需要的rule
        style.sheet.insertRule('\
			@keyframes round {\
				' + SlideFirstNumber + '% { opacity: 1; filter: alpha(opacity=100); }\
				' + SlideMiddleNumber + '% { opacity: 1; filter: alpha(opacity=100); }\
				' + SlideLastNumber + '% { opacity: 0; filter: alpha(opacity=0); }\
			}'
        );
        console.log(style.sheet.cssRules);
        [].forEach.call(a, function (NewOne) {//取得幻燈片內各別物件的html物件
            // NewOne.style.animation = '-webkit-animation: round ' + SlideTotalNumber + 's linear infinite; -webkit-animation-delay: ' + SlideDelayNumber + 's;';
            NewOne.setAttribute('style', '-webkit-animation: round ' + SlideTotalNumber + 's linear infinite; animation: round ' + SlideTotalNumber + 's linear infinite; -webkit-animation-delay: ' + SlideDelayNumber + 's; animation-delay: ' + SlideDelayNumber + 's;');
            SlideDelayNumber -= 5;//每換一個物件delay時間就-5秒
        });
    });
});

$(document).ready(function () {
    $("#carouselProduct").on("slide.bs.carousel", function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $("#carouselProduct > .carousel-inner > .carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $("#carouselProduct > .carousel-inner > .carousel-item")
                        .eq(i)
                        .appendTo("#carouselProduct > .carousel-inner");
                } else {
                    $("#carouselProduct > .carousel-inner > .carousel-item")
                        .eq(0)
                        .appendTo("#carouselProduct > .carousel-inner");
                }
            }
        }
    });
});

$(document).ready(function () {
    $("#carouselMenu").on("slide.bs.carousel", function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $("#carouselMenu > .carousel-inner > .carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $("#carouselMenu > .carousel-inner > .carousel-item")
                        .eq(i)
                        .appendTo("#carouselMenu > .carousel-inner");
                } else {
                    $("#carouselMenu > .carousel-inner > .carousel-item")
                        .eq(0)
                        .appendTo("#carouselMenu > .carousel-inner");
                }
            }
        }
    });
});