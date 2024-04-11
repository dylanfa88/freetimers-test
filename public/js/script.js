$(document).ready(() => {
    $('#calculate-btn').on('click', () => {
        const url = 'calculate.php';
        const data = {
            length_width_unit: $('input[name="length_width_unit"]:checked').val(),
            depth_unit: $('input[name="depth_unit"]:checked').val(),
            length: $('input[name="length"]').val(),
            width: $('input[name="width"]').val(),
            depth: $('input[name="depth"]').val(),
        };
        $.ajax({
                url: url,
                data: data,
                success: (response) => {
                    if (response.status === 'ok') {
                        const bags = response.data.bags_needed;
                        const cost = response.data.cost_with_currency;
                        const msg = `
                            You will need <strong>${bags}</strong> bags, 
                            which will cost you <strong>${cost}(inc VAT)</strong>.`;
                        $('#result-div').html(msg);
                        $('#add-to-cart').removeClass('d-none');
                    }
                    else
                    {
                        alert('Something went wrong!');
                    }
                },
            }
        );
    })
});