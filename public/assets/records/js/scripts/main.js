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

                if ($('.overlay').length > 0) {
                    $(document).on('change', '#file', function () {
                        $('.overlay .check').show();
                    });
                }
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
                    $('.error-message').show()
                    $('.cep-form').val('')
                    return
                }

                $('.error-message').hide()
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
