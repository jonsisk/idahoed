animatedcollapse.addDiv('header', 'fade=0,speed=400,hide=1')
animatedcollapse.addDiv('navigation', 'fade=0,speed=400,hide=1')
animatedcollapse.addDiv('cats', 'fade=0,speed=400,hide=1')
animatedcollapse.addDiv('sliders', 'fade=0,speed=400,hide=1')
animatedcollapse.addDiv('misc', 'fade=0,speed=400,hide=1')
animatedcollapse.addDiv('misc2', 'fade=0,speed=400,hide=1')


animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init()
