//=============================================
// RUTA OCULTA 
//=============================================

var rutaOculta = $("#rutaOculta").val();

/* BOOTSTRAP SLIDER */
var mySlider = $("input.slider").bootstrapSlider();

//=============================================
// Make the dashboard widgets sortable Using jquery UI 
//=============================================

$('.connectedSortable').sortable({
	placeholder         : 'sort-highlight',
	connectWith         : '.connectedSortable',
	handle              : '.box-header, .nav-tabs',
	forcePlaceholderSize: true,
	zIndex              : 999999
});
$('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

//=============================================
// jQuery UI sortable for the todo list 
//=============================================

$('.todo-list').sortable({
	placeholder         : 'sort-highlight',
	handle              : '.handle',
	forcePlaceholderSize: true,
	zIndex              : 999999
});

//------- HACER EL SUBRAYADO --------
$(".todo-list-checkbox").click(function(){
	$(this).parent("li").toggleClass("done");	
})

//=============================================
//  AdminLTE Demo Menu
//=============================================

$(function () {
  
	/**
		* Get access to plugins
	*/
  
	$('[data-toggle="control-sidebar"]').controlSidebar()
	$('[data-toggle="push-menu"]').pushMenu()
  
	var $pushMenu       = $('[data-toggle="push-menu"]').data('lte.pushmenu')
	var $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
	var $layout         = $('body').data('lte.layout')
  
	/**
	 * List of all the available skins
	 *
	 * @type Array
	 */
	var mySkins = [
	  'skin-blue',
	  'skin-black',
	  'skin-red',
	  'skin-yellow',
	  'skin-purple',
	  'skin-green',
	  'skin-blue-light',
	  'skin-black-light',
	  'skin-red-light',
	  'skin-yellow-light',
	  'skin-purple-light',
	  'skin-green-light'
	]
  
	/**
	 * Get a prestored setting
	 *
	 * @param String name Name of of the setting
	 * @returns String The value of the setting | null
	 */
	function get(name) {
	  if (typeof (Storage) !== 'undefined') {
		return localStorage.getItem(name)
	  } else {
		window.alert('Please use a modern browser to properly view this template!')
	  }
	}
  
	/**
	 * Store a new settings in the browser
	 *
	 * @param String name Name of the setting
	 * @param String val Value of the setting
	 * @returns void
	 */
	function store(name, val) {
	  if (typeof (Storage) !== 'undefined') {
		localStorage.setItem(name, val)
	  } else {
		window.alert('Please use a modern browser to properly view this template!')
	  }
	}
  
	/**
	 * Toggles layout classes
	 *
	 * @param String cls the layout class to toggle
	 * @returns void
	 */
	function changeLayout(cls) {
	  $('body').toggleClass(cls)

	  //------- layout-boxed --------
	  if($('body').hasClass('layout-boxed')){
		localStorage.setItem("layout-boxed", "layout-boxed");
	  }else{
		localStorage.setItem("layout-boxed", "");
	  }

	  //------- fixed --------
	  if($('body').hasClass('fixed')){
		localStorage.setItem("fixed", "fixed");
	  }else{
		localStorage.setItem("fixed", "");
	  }

	  //------- sidebar-collapse --------
	  if($('body').hasClass('sidebar-collapse')){
		localStorage.setItem("sidebar-collapse", "sidebar-collapse");
	  }else{
		localStorage.setItem("sidebar-collapse", "");
	  }

	  $layout.fixSidebar();
	  if ($('body').hasClass('fixed') && cls == 'fixed') {
		$pushMenu.expandOnHover();
		$layout.activate();
	  }
	  $controlSidebar.fix();
	}

	//=============================================
	// AÑADIR CLASES AL BODY 
	//=============================================
  
	//------- layout-boxed --------
	if(localStorage.getItem("layout-boxed") != ""){
		document.body.classList.add("layout-boxed");
		document.body.classList.remove("fixed");
	}
	//------- fixed --------
	if(localStorage.getItem("fixed") != ""){
		document.body.classList.add("fixed");
		document.body.classList.remove("layout-boxed");
	}
	//------- sidebar-collapse --------
	if(localStorage.getItem("sidebar-collapse") != ""){
		document.body.classList.add("sidebar-collapse");
	}else{
		document.body.classList.remove("sidebar-collapse");
	}

	/**
	 * Replaces the old skin with the new skin
	 * @param String cls the new skin class
	 * @returns Boolean false to prevent link's default action
	 */
	function changeSkin(cls) {
	  $.each(mySkins, function (i) {
		$('body').removeClass(mySkins[i])
	  })
  
	  $('body').addClass(cls)
	  store('skin', cls)
	  return false
	}
  
	/**
	 * Retrieve default settings and apply them to the template
	 *
	 * @returns void
	 */
	function setup() {
	  var tmp = get('skin')
	  if (tmp && $.inArray(tmp, mySkins))
		changeSkin(tmp)
  
	  // Add the change skin listener
	  $('[data-skin]').on('click', function (e) {
		if ($(this).hasClass('knob'))
		  return
		e.preventDefault()
		changeSkin($(this).data('skin'))
	  })
  
	  // Add the layout manager
	  $('[data-layout]').on('click', function () {
		changeLayout($(this).data('layout'))
	  })
  
	  $('[data-controlsidebar]').on('click', function () {
		changeLayout($(this).data('controlsidebar'))
		var slide = !$controlSidebar.options.slide
  
		$controlSidebar.options.slide = slide
		if (!slide)
		  $('.control-sidebar').removeClass('control-sidebar-open')
	  })
  
	  $('[data-sidebarskin="toggle"]').on('click', function () {
		var $sidebar = $('.control-sidebar')
		if ($sidebar.hasClass('control-sidebar-dark')) {
		  $sidebar.removeClass('control-sidebar-dark')
		  $sidebar.addClass('control-sidebar-light')
		} else {
		  $sidebar.removeClass('control-sidebar-light')
		  $sidebar.addClass('control-sidebar-dark')
		}
	  })
  
	  $('[data-enable="expandOnHover"]').on('click', function () {
		$(this).attr('disabled', true)
		$pushMenu.expandOnHover()
		if (!$('body').hasClass('sidebar-collapse'))
		  $('[data-layout="sidebar-collapse"]').click()
	  })
  
	  //  Reset options
	  if ($('body').hasClass('fixed')) {
		$('[data-layout="fixed"]').attr('checked', 'checked')
	  }
	  if ($('body').hasClass('layout-boxed')) {
		$('[data-layout="layout-boxed"]').attr('checked', 'checked')
	  }
	  if ($('body').hasClass('sidebar-collapse')) {
		$('[data-layout="sidebar-collapse"]').attr('checked', 'checked')
	  }
  
	}
  
	// Create the new tab
	var $tabPane = $('<div />', {
	  'id'   : 'control-sidebar-theme-demo-options-tab',
	  'class': 'tab-pane active'
	})
  
	// Create the tab button
	var $tabButton = $('<li />', { 'class': 'active' })
	  .html('<a href=\'#control-sidebar-theme-demo-options-tab\' data-toggle=\'tab\'>'
		+ '<i class="fa fa-wrench"></i>'
		+ '</a>')
  
	// Add the tab button to the right sidebar tabs
	$('[href="#control-sidebar-home-tab"]')
	  .parent()
	  .before($tabButton)
  
	// Create the menu
	var $demoSettings = $('<div />')
  
	// Layout options
	$demoSettings.append(
	  '<h4 class="control-sidebar-heading">'
	  + 'Opciones de diseño'
	  + '</h4>'
	  // Fixed layout
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox"data-layout="fixed"class="pull-right"/> '
	  + 'Diseño fijo'
	  + '</label>'
	  + '<p>Activar el diseño fijo. No puedes usar diseños fijos y en caja juntos</p>'
	  + '</div>'
	  // Boxed layout
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox" data-layout="layout-boxed" class="pull-right diseñoCaja"/> '
	  + 'Diseño en caja'
	  + '</label>'
	  + '<p>Activar el diseño en caja</p>'
	  + '</div>'
	  // Sidebar Toggle
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox" data-layout="sidebar-collapse"class="pull-right"/> '
	  + 'Alternar barra lateral'
	  + '</label>'
	  + '<p>Alternar el estado de la barra lateral izquierda (abrir o contraer)</p>'
	  + '</div>'
	  // Sidebar mini expand on hover toggle
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox" data-enable="expandOnHover"class="pull-right"/> '
	  + 'Barra lateral Expandir al pasar el mouse'
	  + '</label>'
	  + '<p>Deje que la barra lateral mini se expanda al pasar el mouse</p>'
	  + '</div>'
	  // Control Sidebar Toggle
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox"data-controlsidebar="control-sidebar-open"class="pull-right"/> '
	  + 'Alternar la barra lateral derecha'
	  + '</label>'
	  + '<p>Alternar entre deslizar sobre contenido y empujar efectos de contenido</p>'
	  + '</div>'
	  // Control Sidebar Skin Toggle
	  + '<div class="form-group">'
	  + '<label class="control-sidebar-subheading">'
	  + '<input type="checkbox"data-sidebarskin="toggle"class="pull-right"/> '
	  + 'Cambiar la máscara de la barra lateral derecha'
	  + '</label>'
	  + '<p>Alternar entre máscaras oscuras y claras para la barra lateral derecha</p>'
	  + '</div>'
	)

	var $skinsList = $('<ul />', { 'class': 'list-unstyled clearfix' })
  
	// Dark sidebar skins
	var $skinBlue =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Azul</p>')
	$skinsList.append($skinBlue)
	var $skinBlack =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Blanco</p>')
	$skinsList.append($skinBlack)
	var $skinPurple =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Morado</p>')
	$skinsList.append($skinPurple)
	var $skinGreen =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Verde</p>')
	$skinsList.append($skinGreen)
	var $skinRed =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Rojo</p>')
	$skinsList.append($skinRed)
	var $skinYellow =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin">Amarillo</p>')
	$skinsList.append($skinYellow)
  
	// Light sidebar skins
	var $skinBlueLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Azul Ligero</p>')
	$skinsList.append($skinBlueLight)
	var $skinBlackLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Blanco Ligero</p>')
	$skinsList.append($skinBlackLight)
	var $skinPurpleLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Morado Ligero</p>')
	$skinsList.append($skinPurpleLight)
	var $skinGreenLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Verde Ligero</p>')
	$skinsList.append($skinGreenLight)
	var $skinRedLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Rojo Ligero</p>')
	$skinsList.append($skinRedLight)
	var $skinYellowLight =
		  $('<li />', { style: 'float:left; width: 33.33333%; padding: 5px;' })
			.append('<a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
			  + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
			  + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
			  + '</a>'
			  + '<p class="text-center no-margin" style="font-size: 12px">Amarillo Ligero</p>')
	$skinsList.append($skinYellowLight)
  
	$demoSettings.append('<h4 class="control-sidebar-heading">Pieles</h4>')
	$demoSettings.append($skinsList)
  
	$tabPane.append($demoSettings)
	$('#control-sidebar-home-tab').after($tabPane)
  
	setup();
  
})

//=============================================
// FULL CALENDARIO 
//=============================================

$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
})

//=============================================
// ICHECK AND STAR
//=============================================

$(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
	});
});
	
//=============================================
// ADJUNTAR EL PLUGIN DE EDITOR AL BUZON DE ENVIAR EMAILS 
//=============================================

$(function () {
	//Add text editor
	$("#compose-textarea").wysihtml5();
});

/*=============================================
CORRECCIÓN BOTONERAS OCULTAS BACKEND	
=============================================*/

if(window.matchMedia("(max-width:767px)").matches){
	$("body").removeClass('sidebar-collapse');
}else{
  $("body").addClass('sidebar-collapse');
}

/*=============================================
ACTIVAR SIDEBAR
=============================================*/

$(document).on("click", ".sidebar-menu li", function(){
	localStorage.setItem("botonera", $(this).children().attr("href"));
})

if(localStorage.getItem("botonera") == null){
	$(".sidebar-menu li").removeClass("active");
	$(".sidebar-menu li a[href='inicio']").parent().addClass("active")
}else{
	$(".sidebar-menu li").removeClass("active");
	$("a[href='"+localStorage.getItem("botonera")+"']").parent().addClass("active")
}

//=============================================
//  ACTIVAR SIDEBAR PARA LI CON LA CLASE TREEVIEW
//=============================================

$(document).on("click", ".sidebar-menu li.treeview ul.treeview-menu li", function(){
	localStorage.setItem("botonera2", $(this).children().attr("href"));
})

if(localStorage.getItem("botonera2") == null){
	$(".sidebar-menu li.treeview").removeClass("active");
	$(".sidebar-menu li.treeview ul.treeview-menu li a[href='inicio']").parent().parent().parent().addClass("active")
}else{
	$(".sidebar-menu li.treeview").removeClass("active");
	$("a[href='"+localStorage.getItem("botonera2")+"']").parent().parent().parent().addClass("active")
}

//=============================================
// CK Editor 
//=============================================

// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea').wysihtml5()