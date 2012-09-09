(function($){
	
	var gVars = {};

	$.fn.counterClock = function(opts){
	
		var container = this.eq(0);
		
		if(!opts) opts = {}; 
		
		var defaults = {

			launchDate: { year: 2012, month: 12, day: 31, hour: 00, minute: 00}
		}, launchDateFix;
		

		$.each(defaults,function(k,v){
			opts[k] = opts[k] || defaults[k];
		})
		
		launchDateFix = new Date(opts.launchDate.year, (opts.launchDate.month - 1), opts.launchDate.day, opts.launchDate.hour, opts.launchDate.minute);
		
		gVars["launchDate"] = launchDateFix;

		setUp.call(container);
		
		return this;
	}
	
	function setUp()
	{
		
		setInterval(function(){
		
			var currentTime = new Date(), differenceTime;
			
			differenceTime = new Date(gVars.launchDate.getTime() - currentTime.getTime());
			
			var d = Math.abs((gVars.launchDate.getTime() - currentTime.getTime()) / (24*60*60*1000)).toFixed(0);
			var h = differenceTime.getHours();
			var m = differenceTime.getMinutes();
			var s = differenceTime.getSeconds();
			
			$('.container_clock .days span').html(d);
			$('.container_clock .hours span').html(h);
			$('.container_clock .minutes span').html(m);
			$('.container_clock .seconds span').html(s);
			
		},1000);
	}
	
	
})(jQuery)