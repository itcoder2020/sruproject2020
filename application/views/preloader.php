    <style>

       /*************************/
/*     02. Preloader     */
/*************************/
.spinner-wrapper {
	position: fixed;
	z-index: 999999;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: #fff;
}

.spinner {
	position: absolute;
	top: 50%; /* centers the loading animation vertically one the screen */
	left: 50%; /* centers the loading animation horizontally one the screen */
	width: 3.75rem;
	height: 1.25rem;
	margin: -0.625rem 0 0 -1.875rem; /* is width and height divided by two */ 
	text-align: center;
}

.spinner > div {
	display: inline-block;
	width: 1rem;
	height: 1rem;
	border-radius: 100%;
	background-color: #00bfd8;
	-webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
	animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
	-webkit-animation-delay: -0.32s;
	animation-delay: -0.32s;
}

.spinner .bounce2 {
	-webkit-animation-delay: -0.16s;
	animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
	0%, 80%, 100% { -webkit-transform: scale(0); }
	40% { -webkit-transform: scale(1.0); }
}

@keyframes sk-bouncedelay {
	0%, 80%, 100% { 
		-webkit-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
	} 40% { 
		-webkit-transform: scale(1.0);
		-ms-transform: scale(1.0);
		transform: scale(1.0);
	}
}


    </style>
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
   <script>
           	/* Preloader */
	$(window).on('load', function() {
		var preloaderFadeOutTime = 500;
		function hidePreloader() {
			var preloader = $('.spinner-wrapper');
			setTimeout(function() {
				preloader.fadeOut(preloaderFadeOutTime);
			}, 500);
		}
		hidePreloader();
	});

   </script>