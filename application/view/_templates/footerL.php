</body>

<script>
	var uri = "<?php echo URL; ?>"
</script>



<!-- funciones js -->
 <script class="cssdeck" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
 <script src="<?=  URL ?>/vendors/calendario/js/jquery.min.js"></script>

 <script src="<?=  URL ?>public/js/misFunciones.js"></script>

 <script type="text/javascript">

  (function( $ ) {
  // constants
  var SHOW_CLASS = 'show',
  HIDE_CLASS = 'hide',
  ACTIVE_CLASS = 'active';
  
  $( '.tabs' ).on( 'click', 'li a', function(e){
    e.preventDefault();
    var $tab = $( this ),
    href = $tab.attr( 'href' );

    $( '.active' ).removeClass( ACTIVE_CLASS );
    $tab.addClass( ACTIVE_CLASS );

    $( '.show' )
    .removeClass( SHOW_CLASS )
    .addClass( HIDE_CLASS )
    .hide();
    
    $(href)
    .removeClass( HIDE_CLASS )
    .addClass( SHOW_CLASS )
    .hide()
    .fadeIn( 550 );
});
})( jQuery );</script>

</html>