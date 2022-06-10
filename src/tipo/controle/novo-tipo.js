$(document).ready(function() {

    $('.btn-novo').click(function(e) {
        e.preventDefault()

        //Limpar todas as informações já existentes em nossa modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        //Incluir novos textos no cabeçalho, na minha janela modal
        $('.modal-title').append('Adicionar novo registro')

        //Incluir o nosso formulário dentro do corpo dentro da janela modal
        $('.modal-body').load('src/tipo/visao/form-tipo.html')

        //iremos incluir uma função no botão salvar para demonstrar que é um novo registro
        $('.btn-salvar').attr('data-operation', 'insert')

        //Abrir a janela modal
        $('#modal-tipo').modal('show')

    })
})