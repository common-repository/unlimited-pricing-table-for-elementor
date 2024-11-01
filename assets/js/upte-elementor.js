(function ($) {
    "use strict";

	
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */

    $(window).on("elementor/frontend/init", function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/upte-pricing-two.default', function($scope) {
            // pricing table tabs
            $(".upte-tab").click(function() {
                $(".upte-tab").removeClass("upte-active").eq($(this).index()).addClass("upte-active");
                $(".upte-tab_item").hide().eq($(this).index()).fadeIn(100)
            }).eq(0).addClass("upte-active");
        })
	});

    // pricing plan js for version one
    $(window).on("elementor/frontend/init", function(){
		elementorFrontend.hooks.addAction('frontend/element_ready/upte-pricing-one.default', function($scope) {
           /***********
            pricing plan JS
            ************/
            var checkBox = document.querySelectorAll("#checbox")

            for(let i = 0; i < checkBox.length; i++){
            checkBox[i].addEventListener("click", ()=>{
                var text1 = document.querySelectorAll(".upte_price_1")
                var text2 = document.querySelectorAll(".upte_price_2")
                
                if(checkBox[i].checked == true){

                text1.forEach((e)=>{
                    e.style.display = "block";
                })
                text2.forEach((e)=>{
                    e.style.display = "none";
                })
                } else if (checkBox[i].checked == false) {
                text1.forEach((e)=>{
                    e.style.display = "none";
                })
                text2.forEach((e)=>{
                    e.style.display = "block";
                })
                }

            })
            }
        })
	});

}(jQuery));
