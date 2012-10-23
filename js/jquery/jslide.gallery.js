/*
 * jSlide Gallery v1
 *
*/


(function($){
	var $E={}, S={c:0}, F={}, C={s:'Bck_list_btn_Act',p:'Select_a_'};
  //Selector de imagen
	F.selectImage=function(pC){
		var w=(document.documentElement.clientWidth > $E.c.width()) ? '100% ' : $E.c.width()+'px ';
		$E.v.css({'width':w+'!important','overflow':'hidden'});
    $E.i.attr('style',' background-image: url(' + $E.I[pC].src+')');
    $E.a.attr('href', $E.A[pC].href );
		$E.l.removeClass(C.s).filter('#'+C.p+pC).addClass(C.s);
		S.c=pC;
		self.clearTimeout(S.t);
		S.t=self.setTimeout(function(){ F.selectNextImage(); }, 10500);
	};
	F.selectNextImage=function(){ if (++S.c>=$E.I.length) S.c=0; F.selectImage(S.c); };
  F.selectPreviewImage=function(){ if (--S.c<0) S.c=$E.I.length-1; F.selectImage(S.c); };
  
  //F.selectNextLink==function(){ alert( 0);  };
  //Inicializacion de variables y visualizador
	$(function(){
		$E.b=$('#Bck_list_img');
		$E.I=$E.b.find('img');
    $E.A=$E.b.find('a');
		$E.v=$('#Generalvisor');
		$E.c=$('#contenedor');
		$E.i=$('#GeneralImage');
    $E.a=$('#LinkImage');
		$E.s=$('#Selector').css('width',($E.I.length*22)+'px');
		for (i=0;i<$E.I.length;i++) $E.s.append('<li id="'+C.p+i+'"><a></a></li>');
		$E.l=$E.s.find('li').bind('click', function(){ F.selectImage($E.l.index($(this))); });
    
    $('#NextImage').bind('click', function(){ F.selectNextImage(); });
    $('#PreviewImage').bind('click', function(){ F.selectPreviewImage(); });
    $('#NextImage').css( "cursor","pointer" );
    $('#PreviewImage').css( "cursor","pointer" );
    
    
    
    //$('.link').css( "cursor","pointer" );

    
    //$('.link').bind('click', function(){ F.selectNextLink(); });
    //$('.link').bind('click', function(){ $(location).attr('href','#'); });
    
    
    
		F.selectImage(S.c);
		S.t=self.setTimeout(function(){ F.selectNextImage(); }, 10500);
	});
	$(window).resize(function(){ F.selectImage(S.c); });
})(jQuery);
