$(document).ready(function(){

    AOS.init();

    $("div.image-wrap img").addClass("img-responsive");
    $("div.image-wrap img").css("max-width", "100%");

	$('.profile_editBtn').show();
	$('.profile_cancelBtn').hide();

	$('.profile_editBtn').on('click', function(){
		$("fieldset").removeAttr("disabled");
		$("#imageUpload").removeAttr("disabled");

		$('.profile_editBtn').hide();
		$('.profile_cancelBtn').show();

	});

	$('.profile_cancelBtn').on('click', function(){
		$('#imageUpload').prop('disabled', true);
		$('fieldset').prop('disabled', true);


		$('.profile_editBtn').show();
		$('.profile_cancelBtn').hide();

	});

	function readURL(input){
        // console.log(input.files);
        if (input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
                $('.photodata').val(input.files[0]['name']+'/'+input.files[0]['name']);
            }
            reader.readAsDataURL(input.files[0]);
            console.log('preivew');
        }
        console.log(input.files);
    }
    $("#imageUpload").change(function() {
        readURL(this); 
    });

    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    $('.nav-tabs').on('click', 'li', function() {
        $('.nav-tabs li.active').removeClass('active');
        $(this).addClass('active');
    });

	$('.modal-image').on('click', function(){
		alert('hello');
	});

    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

    var $owl = $('.loop');
  
    $owl.owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 800,
        center: true,
        items: 1.4,
        stagePadding: 15,
        loop: true,
        margin: 15,
      animateOut: 'slide-up',
    animateIn: 'slide-down',
    });

});


    $(function() {

        $('#alltopics .gallery1').imagesGrid({
            image: ['mmitui/image/p1.jpg'],
            onGridItemRendered: function($item, image) { return true },
            onGridImageLoaded: function(event, $img, image) { return true }

        });

        // $('#alltopics').imagesGrid('.gallery2', function()
        // {
        //     console.log('aa');
        //     images: [
        //         'mmitui/image/test/an1.jpg',
        //         'mmitui/image/test/an2.jpg'
        //     ]
            
        // });


        $('#alltopics .gallery2').imagesGrid({
        	images: [
                'mmitui/image/test/an1.jpg',
            	'mmitui/image/test/an2.jpg'
            ],

            // images: images.slice(0, 5)
        });

        $('#alltopics .gallery3').imagesGrid({
            images: [
                'mmitui/image/test/s1.jpg',
            	'mmitui/image/test/s2.jpg',
            	'mmitui/image/test/s3.jpg'
            ],

        });

        $('#alltopics .gallery4').imagesGrid({
            images: [
                'mmitui/image/test/tip1.jpg',
            	'mmitui/image/test/tip2.jpg',
            	'mmitui/image/test/tip3.jpg',
            	'mmitui/image/test/tip4.jpg'
            ],
        });
        $('#alltopics .gallery5').imagesGrid({
            images: [
                'mmitui/image/test/g5_1.jpg',
            	'mmitui/image/test/g5_2.jpg',
            	'mmitui/image/test/g5_3.jpg',
            	'mmitui/image/test/g5_4.jpg',
            	'mmitui/image/test/g5_5.jpg'

            ],
        });
        $('#alltopics .gallery6').imagesGrid({
            images: [
                'mmitui/image/test/1.jpg',
            	'mmitui/image/test/2.jpg',
            	'mmitui/image/test/3.jpg',
            	'mmitui/image/test/4.jpg',
            	'mmitui/image/test/5.jpg',
            	'mmitui/image/test/6.jpg'
            ],
        });

        $('#alltopics .gallery7').imagesGrid({
            images: [
                'mmitui/image/test/p2.jpg',
            	'mmitui/image/test/p3.jpg',
            	'mmitui/image/test/p4.jpg',
            	'mmitui/image/test/p5.jpg',
            	'mmitui/image/test/p6.jpg',
            	'mmitui/image/test/p7.jpg',
            	'mmitui/image/test/p8.jpg',
            	'mmitui/image/test/p9.jpg',
            	'mmitui/image/test/p10.jpg',
            	'mmitui/image/test/p11.jpg',

                ],
            align: true,
            getViewAllText: function(imgsCount) { return 'View all' },
            onGridItemRendered: function($item, image) { },
            onGridImageLoaded: function(event, $img, image) { }
        });

    });