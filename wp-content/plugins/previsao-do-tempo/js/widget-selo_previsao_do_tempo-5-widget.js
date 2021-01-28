/*
 * Classe Extendida do core do WP - WP_Widget
 * Criada por: Diego Andrade
 * E-mail: diego.andrade@climatempo.com.br
 * Data: 03-04-2014
 * 
 * Copyright 2014 - Climatempo. Todos os direitos reservados. */
jQuery(document).ready(function ($) {

    /*
     * WIDGET 5
     * */

    var widgetseloprevisaodotempo5iframeSkin150 = '<iframe src="' + $("#widget-selo_previsao_do_tempo-5-iframeSkin150").val() + '" scrolling="no" frameborder="0" width="150" height="170" marginheight="0" marginwidth="0"></iframe>';
    var widgetseloprevisaodotempo5iframeSkin120 = '<iframe src="' + $("#widget-selo_previsao_do_tempo-5-iframeSkin120").val() + '" scrolling="no" frameborder="0" width="120" height="170" marginheight="0" marginwidth="0"></iframe>';
    var widgetseloprevisaodotempo5skinCor = $("#widget-selo_previsao_do_tempo-5-skinCor").val();

    $("#widget-selo_previsao_do_tempo-5-estado").trigger("change");
    $(document).on("change", "#widget-selo_previsao_do_tempo-5-skinSelo", function () {
        $("#widget-selo_previsao_do_tempo-5-150x170").html(widgetseloprevisaodotempo5iframeSkin150.replace(widgetseloprevisaodotempo5skinCor, $(this).val()));
        $("#widget-selo_previsao_do_tempo-5-120x170").html(widgetseloprevisaodotempo5iframeSkin120.replace(widgetseloprevisaodotempo5skinCor, $(this).val()));
    });


    $(document).on("change", "#widget-selo_previsao_do_tempo-5-tamanhoSkin", function () {
        if ($(this).val() == "150") {
            $("#widget-selo_previsao_do_tempo-5-120x170").fadeOut("fast");
            $("#widget-selo_previsao_do_tempo-5-150x170").fadeIn("slow");
        } else {
            $("#widget-selo_previsao_do_tempo-5-150x170").fadeOut("fast");
            $("#widget-selo_previsao_do_tempo-5-120x170").fadeIn("slow");
        }
    });


    $(document).on("change", "#widget-selo_previsao_do_tempo-5-estado", function () {
        var estado = $(this).val(), caminho = $(this).attr("dirname"), opt = '';

        $.ajax({
            type: "POST",
            dataType: "json",
            url: caminho + '/previsao-do-tempo/ajax/filterlocation.php',
            data: { uf: estado, dir: caminho},
            success: function (response) {
                var select = $("#widget-selo_previsao_do_tempo-5-cidadeFrom");
                if (select.prop)
                    var options = select.prop('options');
                else
                    var options = select.attr('options');

                $('option', select).remove();


                $.each(response, function (val, text) {
                    if (typeof text != 'undefined' && typeof val != 'undefined' && text != '' && val != '') {
                        opt += "<option value='" + val + "'>" + text + "</option>";
                    }
                });

                select.append(opt);
            }
        })
    });

    var selectedVal, selectedText, erro = true, qtdCidades = 0, flagCidade = 0;

    $(document).on("click", "#widget-selo_previsao_do_tempo-5-cidadeFrom", function () {
        $('#widget-selo_previsao_do_tempo-5-cidadeFrom > option:selected').each(function () {
            selectedVal = $(this).val();
            selectedText = $(this).text().trim();

            numCid = wsctcontaCidade(5);

            erro = wsctverificaDuplicidade(selectedVal + "|" + selectedText, 5);

            if (numCid <= 4 && erro === true) {

                if (wsctaddCidade(selectedVal, selectedText, 5) == true) {
                    $("#widget-selo_previsao_do_tempo-5-cidadeTo").prepend("<option value='" + selectedVal + "'>" + selectedText + "</option>");
                }
            }
            else {
                if (numCid > 4) {
                    $("#widget-selo_previsao_do_tempo-5-cidError1").removeClass("disnone")
                    setTimeout(function () {
                        $("#widget-selo_previsao_do_tempo-5-cidError1").addClass("disnone")
                    }, 4000);
                }
            }
        });
    });

    $(document).on("click", "#widget-selo_previsao_do_tempo-5-cidadeTo", function () {
        var valor = $(this).val()
        var txt = $("#widget-selo_previsao_do_tempo-5-cidadeTo option[value='" + valor + "']").text();
        txt = txt.trim();
        wsctremoveCidade(valor + "|" + txt, 5);
        $("#widget-selo_previsao_do_tempo-5-cidadeTo option[value='" + valor + "']").remove();
    })

    $(document).on("click", "#widget-selo_previsao_do_tempo-5-savewidget", function () {
        var cidadesSelected = '';
        $("#widget-selo_previsao_do_tempo-5-cidadeTo option").each(function () {
            if (cidadesSelected != '')
                cidadesSelected += ",";
            cidadesSelected += $(this).val();
        });
    });
});