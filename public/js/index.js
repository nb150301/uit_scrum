$(document).on('click', '.approve-btn',(event) => {
    const _self = $(event.currentTarget);

    const token = _self.find('input[type="hidden"]').val();
    $.ajax({
        type: "POST",
        url: "manager-request-list",
        headers: {
            'X-CSRF-Token': token
        },
        data: {
            'form_id': _self.data('form-id')
        },
    }).done(function (data) {
        location.reload();
    });
})

$(document).on('click', '.action-btn', (event) => {
    const _self = $(event.currentTarget)
    const token = _self.find('input[type="hidden"]').val();
    const dataId = _self.data('form-id');

    console.log(dataId);

    $('#exampleModal').attr('data-form-id', dataId);
    $('#exampleModal').attr('data-token', token);

})

$(document).on('click', '.submit-modal-btn', (event) => {
    const _self = $(event.currentTarget)

    const modal = _self.closest('.modal');

    const typeForm = modal.find('.type-form')
    const reasonForm = modal.find('.reason-form')
    $.ajax({
        type: "POST",
        url: "manager-request-list",
        headers: {
            'X-CSRF-Token': modal.data('token')
        },
        data: {
            'form_id': modal.data('form-id'),
            'type': typeForm.val(),
            'reason': reasonForm.val()
        },
    }).done(function (data) {
        location.reload();
    });
    console.log(typeForm.val())
    console.log(reasonForm.val())
    console.log(modal.data('token'))
    console.log(modal.data('form-id'))
})
