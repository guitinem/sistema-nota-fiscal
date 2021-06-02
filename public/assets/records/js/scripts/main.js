$(document).ready(function () {

    var main = (function () {
        return {
            vars: {
                windowWidth: $(window).width(),
                mobile: ($(window).width() > 768),
            },
            init: function () {
                this.initFeatures();
                this.initCadastro();
                this.validationInputFile();
                this.formInsert();
            },
            initFeatures: function () {

            },
            initCadastro: function () {
                var that = this;

                if ($('#cep').length > 0) {
                    $('#cep').mask('00000-000', optionsCep);
                }
                if ($('#cpf').length > 0) {
                    $('#cpf').mask('000.000.000-00');
                }

                $('#newForm').click(function () {
                    $('.overlay').addClass('active');

                    $('html, body').stop().animate({
                        scrollTop: $('.overlay').offset().top
                    }, 500);
                });


            },
            validationInputFile: function () {
                const validTypes = ['jpg', 'jpeg', 'png']


                $('#file').change(function () {
                    const fileInput = document.getElementById('file');
                    const fileType = fileInput.value.split('.')[1];

                    if (!validTypes.includes(fileType)) {
                        $('#error-message-file').text('Apenas arquivos no formato PNG, JPG e JPGE')
                        $('#error-message-file').show()
                        fileInput.value = ''
                        $('.overlay .check').hide();
                        return
                    }

                    $('#error-message-file').hide()
                    $('.overlay .check').show();
                })
            },
            formInsert: function () {
                $('#form-cadastro').submit(function(e) {
                    let formStatus = true

                    if ($('#file').val() == '') {
                        $('html, body').animate({ scrollTop: 0 }, 'slow', function () {
                            $('#error-message-file').text('Por favor, anexe a nota fiscal')
                            $('#error-message-file').show()
                        });
                        formStatus = false
                    } else {
                        $('#error-message-file').hide()
                    }

                    if (!$('#terms').is(":checked")) {
                        $('html, body').animate({ scrollTop: $(document).height() }, 'slow', function () {
                            $('#error-message-terms').show()
                        });
                        formStatus = false
                    } else {
                        $('#error-message-terms').hide()
                    }

                    if (!formStatus) {
                        e.preventDefault()
                    }
                });
            }
        }
    })();

    main.init();
});


/**
 * Controll the input cep
 */
const optionsCep = {
    onComplete: function () {
        const cep_code = $('#cep').val().replace('-', '');
        $('#spin').show();

        fetch(`https://viacep.com.br/ws/${cep_code}/json/`).then(function (response) {
            response.json().then(function (data) {

                if (data.erro) {
                    $('#spin').hide();
                    $('#error-message-cep').show()
                    $('.cep-form').val('')
                    return
                }

                $('#error-message-cep').hide()
                document.getElementById('state').value = data.uf;
                document.getElementById('city').value = data.localidade;
                document.getElementById('street').value = data.logradouro;
                document.getElementById('complement').value = data.complemento;
                document.getElementById('district').value = data.bairro;

                $('#spin').hide();
            });
        }).catch(function (err) {
            console.error('Failed retrieving cep information', err);
            alert('Erro para obter informações do cep, tente novamente')
        });
    },
    onInvalid: function (val, e, f, invalid, options) {
        var error = invalid[0];
        console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
    }
};
