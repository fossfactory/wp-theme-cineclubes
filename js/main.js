//Boostrap ToolTip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});


//Deixa os campos de formulário obrigatórios
$(document).ready(function(e){
    $('.form_obrigatorio input, .form_obrigatorio textarea, .form_obrigatorio select')
        .not('[type=submit], [type=hidden], [type=checkbox], .not-require').each(function(e){
            $(this).prop('required', true);
        });
});

//Campos Especiais Form
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');

//Forms PostTypes Cineclubes
$(function () {    
    //Cadastro de Sessão: Exibe/Inibe input de "Outros" em Sessão gratuita
    $('.requisito_opt').on('change', function(e){
        
        if ( $(this).val() ==  'Text')
            $('.requisito')
                .removeClass('hidden')
                .slideDown()
                .val('')
                .prop('required', true);
        else 
            $('.requisito')
                .slideUp(400, function(e){
                    $(this).val( $('.requisito_opt').val() );
                })
                .prop('required', false);
    });

    //Não permite repetir faixa etária primária/secundária
    $('.fetaria_exc').on('change',function(e){
        var exc     = $('.fetaria_exc[name="fetaria_' + ( ( $(this).attr('name') == 'fetaria_prim') ? 'segun' : 'prim' ) + '"]'),
            that    = $(this);        
        exc.each(function(e){                                            
            $(this).prop('disabled', $(this).val() == that.val());                        
        });
    });

    //Show Filme
    $('.js-mostra-mais').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 16 ; i++){
            var classe = 'js-filme'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).show();   
                $('.'+classe+' input, .'+classe+' textarea')
                    .not('[type=submit], [type=hidden]')
                    .each(function(e){
                        $(this).prop('required', true);
                    });             
            }
        };
    });

    //Hide Filme
    $('.js-mostra-menos').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 16 ; i++){
            var classe = 'js-filme'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).hide();
                $('.'+classe+' input, .'+classe+' textarea')
                    .not('[type=submit], [type=hidden]')
                    .each(function(e){
                        $(this).prop('required', false);
                    });
            }
        };
    });


    //Show Debatedor
    $('.js-mostra-mais').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 5 ; i++){
            var classe = 'js-debatedor'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).show();
                $('.'+classe+' input, .'+classe+' textarea')
                    .not('[type=submit], [type=hidden]')
                    .each(function(e){
                        $(this).prop('required', true);
                    });
            }
        };
    });

    //Hide Debatedor
    $('.js-mostra-menos').on('click', function(e){
        e.preventDefault();
        for(var i = 1;  i <= 5 ; i++){
            var classe = 'js-debatedor'+i;
            if( $( this ).hasClass(classe) ){
                $('div.'+classe).hide();
                $('.'+classe+' input, .'+classe+' textarea')
                    .not('[type=submit], [type=hidden]')
                    .each(function(e){
                        $(this).prop('required', false);
                    });
            }
        };
    });
    
    //Sessao Dentro do CINECLUBE
    $('.sessao_local').on('click', function(){
        var logradouro = $('.js-logradouro').val();
        var numero = $('.js-numero').val();
        var complemento = $('.js-complemento').val();
        var bairro = $('.js-bairro').val();
        var cidade = $('.js-cidade').val();
        var estado = $('.js-estado').val();
        var cep = $('.js-cep').val();


        var sessao = $(this).val() != 'nao';
        $('.logradouro').val(sessao ? logradouro : '').attr('disabled', sessao).attr('required', !sessao);
        $('.numero').val(sessao ? numero : '').attr('disabled', sessao).attr('required', !sessao);
        $('.complemento').val(sessao ? complemento : '').attr('disabled', sessao).attr('required', !sessao);
        $('.bairro').val(sessao ? bairro : '').attr('disabled', sessao).attr('required', !sessao);
        $('.cidade').val(sessao ? cidade : '').attr('disabled', sessao).attr('required', !sessao);
        $('.estado').val(sessao ? estado : '').attr('disabled', sessao).attr('required', !sessao);
        $('.cep').val(sessao ? cep : '').attr('disabled', sessao).attr('required', !sessao);

        /*
        if(sessao == "nao"){
            $('.logradouro').val(" ").attr('disabled', false);
            $('.numero').val(" ").attr('disabled', false).;
            $('.complemento').val(" ").attr('disabled', false).;
            $('.bairro').val(" ").attr('disabled', false).;
            $('.cidade').val(" ").attr('disabled', false).;
            $('.estado').val(" ").attr('disabled', false).;
            $('.cep').val(" ").attr('disabled', false).;
        }else{
            $('.logradouro').val(logradouro).attr('disabled', true);
            $('.numero').val(numero).attr('disabled', true).;
            $('.complemento').val(complemento).attr('disabled', true).;
            $('.bairro').val(bairro).attr('disabled', true).;
            $('.cidade').val(cidade).attr('disabled', true).;
            $('.estado').val(estado).attr('disabled', true).;
            $('.cep').val(cep).attr('disabled', true).;
        }*/
    });

     //Sessao Dentro do CINECLUBE
    $('.havera_debate').on('change', function(){        
        if($(this).val() == "sim")
            $('.debate-content')
                .show()
                .find('input.js-debatedor1')
                .not('[type=submit], [type=checkbox], [type=hidden]')
                .each(function(e){
                    $(this).prop('required', true);
                });
        else
            $('.debate-content')
                .hide()
                .find('input')
                .not('[type=submit], [type=checkbox], [type=hidden]')
                .each(function(e){
                    $(this).prop('required', false);
                });        
    });    

    //pegar value Nome, Id Sessao, Form relatorio
    $('select.js-title-sessao').on('change', function(){
        var id = $('select.js-title-sessao option:selected').attr('rel');
        var data = $('select.js-title-sessao option:selected').attr('date');
        
        $('.js-sessao-id').val( id );   
        $('.js-sessao-data').val( data  );  
        
        var url_theme = theme.url;
        var url_form = url_theme + '/includes/actions/ajax_relatorio.php';
        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            responseType: 'json',

            data: { id: id},
            success: function( response ) { 
                console.log(  response );

                $('.data_sessao').val( response.data_sessao  );  
                $('.time').val( response.horario );  

                if(response.sessao_local === "sim" ){
                $( ".sessao_local[value=sim]" ).prop( "checked", true );
                }else{
                    $( ".sessao_local[value=nao]" ).prop( "checked", true );
                };
    
                $('.logradouro').val( response.logradouro   );  
                $('.numero').val( response.numero   );  
                $('.complemento').val( response.complemento  );  
                $('.bairro').val( response.bairro   );  
                $('.cidade').val( response.cidade   ); 
                $('.estado').val( response.estado );   
                $('.cep').val( response.cep   );
                $('.requisito').val( response.requisito  );   
                
                
                for(var i = 0; i <= 16; i++){
                    var filme = "nome_filme"+i;
                    var original = "nome_original"+i;
                    var direcao = "direcao"+i;
                    var ano = "ano"+i;
                    var pais = "pais"+i;
                    var leg_dub = "leg_dub"+i;
                    var idioma = "idioma"+i;
                    var sinopse = "sinopse"+i;
                    var classificacao = "classificacao"+i;

                    if (typeof response[filme] != 'undefined') {
                        $(".nome_filme"+i).val( response[filme] );
                        $(".nome_original"+i).val( response[original] ); 
                        $(".direcao"+i).val( response[direcao] );   
                        $(".ano"+i).val( response[ano]   );
                        $(".pais"+i).val( response[pais] );   
                        
                        var leg_dub = response[leg_dub].split(",");

                        for (l in leg_dub) {
                            var item = leg_dub[l].trim();
                            $( ".leg_dub"+i+"[value='"+item+"']" ).prop( "checked", true );
                        }

                        $(".idioma"+i).val( response[idioma]  );
                        $(".sinopse"+i).val( response[sinopse]  );

                        $(".classificacao"+i+"[value='"+response[classificacao]+"']").prop( "checked", true );

                        $('.js-filme'+i).removeClass("hide submit-hide");
                    }else{
                        $('.js-filme'+i).addClass("hide submit-hide");
                    }

                };
               
                

                if(response.havera_debate === "sim" ){
                    $( ".debate-content" ).show();
                    $( ".havera_debate[value=sim]" ).prop( "checked", true );
                }else{
                    $( ".havera_debate[value=nao]" ).prop( "checked", true );
                     $(".debate-content").hide();

                };

                if(response.thumb_url != ""){
                    $('.thumb-sessao').removeClass('hide');
                    $('.thumb-sessao').val( response.thumb_id );
                    $('.thumb-sessao img').attr("src", response.thumb_url);
                }else{
                    $('.thumb-sessao').addClass('hide');
                    $('.thumb-sessao').val( response.thumb_url );
                    $('.thumb-sessao img').attr("src", response.thumb_url);
                };
               
                
                for(var d = 1; d <= 5; d++){
                    var nome_debatedor = "nome_debatedor"+d;
                    var bibliografia_debatedor = "bibliografia_debatedor"+d;
                    var foto_debatedor = "foto_debatedor"+d;

                    if (typeof response[nome_debatedor] != 'undefined') {

                        $(".nome_debatedor"+d).val( response[nome_debatedor]  );
                        $(".bibliografia_debatedor"+d).val( response[bibliografia_debatedor] ); 

                        if(response[foto_debatedor] != ""){
                            $('.foto_debatedor'+d).removeClass('hide');
                            $('.foto_debatedor'+d).val( response[foto_debatedor]  );
                            $('.foto_debatedor'+d+' img').attr("src", response[foto_debatedor] );
                        }else{
                            $('.foto_debatedor'+d).addClass('hide');
                            $('.foto_debatedor'+d).val( response[foto_debatedor]  );
                            $('.foto_debatedor'+d+' img').attr("src", response[foto_debatedor] );
                        };

                        $('.js-debatedor'+d).removeClass("hide submit-hide");
                    }else{
                        $('.js-debatedor'+d).addClass("hide submit-hide");
                    };

                };
                
            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });


    });

    //Validando Sessao Realizada??
    $('.js-sessaorealizada').on('change', function(){
        var realizada = $(this).val() == 'realizada';
        $('.js-sessao-' + ( realizada ? 'cancelada' : 'realizada' ) )
            .hide(100)
            .find('input, textarea')
            .not('[type=submit], [type=checkbox], [type=hidden]')
            .each(function(e){
                $(this).prop('required', false);
            });
        $('.js-sessao-' + ( realizada ? 'realizada' : 'cancelada' ) )
            .show(100)
            .find('input, textarea')
            .not('[type=submit], [type=checkbox],  [type=hidden]')
            .each(function(e){
                $(this).prop('required', true);
            });        
    });

    //LightBox Galeria
    // delegate calls to data-toggle="lightbox"
    $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox({
            onShown: function() {
                if (window.console) {
                    //return console.log('Checking our the events huh?');
                }
            },
            onNavigate: function(direction, itemIndex) {
                if (window.console) {
                    //return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                }
            }
        });
    });

    // navigateTo
    // delegate calls to data-toggle="lightbox"
    $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
        event.preventDefault();

        var lb;
        return $(this).ekkoLightbox({
            onShown: function() {

                lb = this;

                $(lb.modal_content).on('click', '.modal-footer a', function(e) {

                    e.preventDefault();
                    lb.navigateTo(2);

                });

            }
        });
    });



});








//AJAXs
$(function () {        
    //AJAX CINECLUBE
     $('#form_cineclube').submit(function(){                    
        var url_theme = theme.url;

        $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );
       
        var postData =  $(this).serialize();
        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';


        
        var image_upload = $('.thumb-cineclube').val();
        if(image_upload.length > 0){
            image_upload = image_upload.split(',');
        }

        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_cineclube',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                $('.loading').empty();
                
                $('.message-success').show(200);
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                if(image_upload.length > 0){
                    
                    var image = url_upload + '/cineclube/' + image_upload[0];
                    
                    if ($('div').hasClass('img-existe')) {

                        $('.img-existe img').attr('src', image ); 

                    }else{

                        var image_view = "<div class='img-existe'><img src='" + image  + "' ></div>";
                        $('.thumb_view').html( image_view );
                    }
                    
                }

                $("#msgBox").html(" ");
                $('.thumb-cineclube').val(" ");

            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;

    });


    //AJAX SESSÃO
    $('#form_sessao').submit(function( ){
       
       var url_theme = theme.url;
       $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );


        $('.logradouro').attr('disabled', false);
        $('.numero').attr('disabled', false);
        $('.complemento').attr('disabled', false);
        $('.bairro').attr('disabled', false);
        $('.cidade').attr('disabled', false);
        $('.estado').attr('disabled', false);
        $('.cep').attr('disabled', false);


        var postData =  $(this).serialize();
       
        var url_theme = theme.url;
        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';




        
        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_sessao',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                
                $('.message-success').show(200);
                $('.loading').empty();
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                $("#msgBox").html(" ");
                $("#form_sessao").each(function(){
                   this.reset(); 
                });
                $('.preview-image').hide();
                $('.submit-hide').hide();
    
            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;

    });

     //AJAX RELATORIOS
    $('#form_form_relatorio').submit(function( ){
        var url_theme = theme.url;
        $('.loading').append("<img src='"+ url_theme +"/images/loading.gif'/>" );
        
        var postData =  $(this).serialize();
       

        var url_upload = theme.upload;
        url_form = url_theme + '/includes/actions/forms_frontend.php';
        
        // setup the ajax request
        $.ajax({
            url: url_form,
            type: "POST",
            action: 'form_form_relatorio',
            enctype: 'multipart/form-data',
            data: postData,
            success: function( response ) { 
                
                $('.loading').empty();
                
                $('.message-success').show(200);
    
                setTimeout(function(){
                  $('.message-success').fadeOut('fast');
                }, 4000);
                
                $("#msgBox").html(" ");
                $("#form_form_relatorio").each(function(){
                   this.reset(); 
                });
                $('.preview-image').hide();

                //location.reload();

            },  
            error: function(jqXHR, textStatus, errorThrown){                                        
                //console.log("The following error occured: " + textStatus, errorThrown);                                                       
            },
            
        });
        
        return false;
        
    });


});


//AJAX FILES
$(function(){
    
    function escapeTags( str ) {
      return String( str )
               .replace( /&/g, '&amp;' )
               .replace( /"/g, '&quot;' )
               .replace( /'/g, '&#39;' )
               .replace( /</g, '&lt;' )
               .replace( />/g, '&gt;' );
    }

    $('.btn-upload').on('click', function(e){
        e.preventDefault();
        //Get Class Button Upload File
        var classNames = $(this).attr('class');
        classNames =  classNames.split(' ');
        var btn_class = "." + classNames[4];
        var btn_id = $(this).attr('id');
       
        //Funcao de Upload
        simple_upload( btn_id , btn_class );
    });

    function simple_upload( btn_id, btn_class ){
        
        var url_theme = theme.url;
        url_theme = theme.url +  '/includes/actions/file_upload.php';
        var url_upload = theme.upload;
        var images = ["jpg", "png", "gif"];

        var btn = btn_id,
            progressBar = document.getElementById('progressBar'),
            progressOuter = document.getElementById('progressOuter'),
            msgBox = document.getElementById('msgBox');

        var uploader = new ss.SimpleUpload({
            button: btn,
            url: url_theme,
            name: 'uploadfile',
            multipart: true,
            hoverClass: 'hover',
            focusClass: 'focus',
            responseType: 'json',
            startXHR: function() {
                progressOuter.style.display = 'block'; // make progress bar visible
                this.setProgressBar( progressBar );
            },
            onSubmit: function( filename, extension ) {
                msgBox.innerHTML = ''; // empty the message box
                btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                
                var extension = extension;
                
            
                if($.inArray(extension, images) >= 0){
                    var type = "image/"+extension;
                    $('.thumb_type').val(type);
                }

                if($.inArray(extension == "pdf") >= 0){
                    var type = "application/pdf";
                    $('.thumb_type').val(type);
                }

                if(extension == "docx"){
                    var type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
                    $('.thumb_type').val(type);
                }

                if(extension == "doc"){
                    var type = "application/msword";
                    $('.thumb_type').val(type);
                }

                if(extension == "txt"){
                    var type = "text/plain";
                    $('.thumb_type').val(type);
                }

                var info = filename + "," + type;
                $( btn_class ).val(info);

            },
            onComplete: function( filename, response, uploadBtn ) {
                btn.innerHTML = 'Choose Another File';
                progressOuter.style.display = 'none'; // hide progress bar when upload is completed

                if ( !response ) {
                    msgBox.innerHTML = 'Unable to upload file ' + response;
                    return;
                }

                if ( response.success === true ) {
                    msgBox.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>';
                    
                    var url_image = url_upload + '/cineclube/' + filename;
                    $(btn_class).show(200);
                    
                    $(btn_class + ' img').attr('src', url_image );
                    
                    extension = filename.substr(filename.length - 3); 

                    if($.inArray(extension, images) >= 0){
                        $(btn_class + ' img').attr('src', url_image );
                    }else{
                        
                        url_image = url_upload + '/cineclube/documento.png';
                        $(btn_class + ' img').attr('src', url_image );
                    }
                    


                } else {
                    if ( response.msg )  {
                        msgBox.innerHTML = escapeTags( response.msg );

                    } else {
                        msgBox.innerHTML = 'An error occurred and the upload failed.';
                    }
                }
            },
            onError: function(jqXHR, textStatus, errorThrown) {
                progressOuter.style.display = 'none';
                msgBox.innerHTML = 'Unable to upload file' + textStatus;
            }
        });
    };//Function simple_upload();
});