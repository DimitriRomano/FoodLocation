
  			$(document).ready(function() {
  				$("#searchBox").keyup(function() {
  					var query = $("#searchBox").val();
  					if(query.length > 0){
  						$.ajax(
  							{
  								url:'./php/autocomplete.php',
  								method:'POST',
  								data: {
  									search: 1,
  									q: query
  								},
  								success: function(data){
                    var dat="<ul>";
                    $.each(data, function(key,val) {
                      dat+="<li>";
                      dat+=val;
                      dat+="</li>";
                    }); 
                    
                    dat += "</ul>";
                 
  									$("#response").html(dat);
                
  								},
  								dataType: 'json'
  							}
  						);
  					}

  				});


          $("#response").on('click','li', function (){
              var resto = $(this).text();
              $("#searchBox").val(resto);
              $("#response").html("");
          });



  			});

         /*var active = -1;

            $(document).ready(function () {
                $("#searchBox").keyup(function (e) {
                    var code = e.which;
                    if (code == 40) { //key down
                        active++;

                        if (active > $('ul li').length)
                            active = $('ul li').length;

                        switchActiveElement();
                    } else if (code == 38) { //key up
                        active--;
                        if (active < -1)
                            active = -1;

                        switchActiveElement();
                    } else if (code == 13) { //enter key
                        selectOption($('.active'));
                    } else {
                        var query = $("#searchBox").val();

                        if (query.length > 0) {
                            $.ajax(
                                {
                                    url: './php/autocomplete.php',
                                    method: 'POST',
                                    data: {
                                        search: 1,
                                        q: query
                                    },
                                    success: function (data) {
                                         var dat="<ul>";
                                        $.each(data, function(key,val) {
                                          dat+="<li>";
                                          dat+=val;
                                          dat+="</li>";
                                        }); 
                                        
                                        dat += "</ul>";
                                     
                                        $("#response").html(dat);
                
                              
                                    },
                                    dataType: 'json'
                                }
                            );
                        }
                    }

                $("#searchBox").on('focusout',function(){
                    $("#response").html("");
                });

              });

                $(document).on('click', 'li', function () {
                    selectOption($(this));
                });
            });

            function switchActiveElement() {
                $('.active').removeAttr('class');
                $('ul li:eq('+active+')').attr('class', 'active');
            }

            function selectOption(caller) {
                var resto = caller.text();
                $("#searchBox").val(resto);
                $("#response").html("");
            }*/