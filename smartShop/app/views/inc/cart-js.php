<script>
    function updateProductTotal(selectElement) {
        const quantity = parseInt(selectElement.value) || 0;
        const price = parseFloat(selectElement.dataset.price);
        const productTotalElement = selectElement.closest('tr').querySelector('.product-total');
        const productTotal = (quantity * price).toFixed(2);

        productTotalElement.innerText = productTotal;

        updateGrandTotal();
    }

    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.product-total').forEach(function(totalElement) {
            let total = parseFloat(totalElement.innerText);
            grandTotal += total;
        });
        document.getElementById('cart-subtotal').innerText = `$${grandTotal.toFixed(2)}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateGrandTotal();

        document.querySelectorAll('.quantity-select').forEach(function(selectElement) {
            setTimeout(function() {
                const options = selectElement.querySelectorAll('option');
                const randomIndex = Math.floor(Math.random() * options.length);
                selectElement.value = options[randomIndex].value;
                updateProductTotal(selectElement);
            }, 50);

            setTimeout(function() {
                selectElement.value = 1;
                updateProductTotal(selectElement);
            }, 250);
            
            selectElement.addEventListener('change', function() {
                updateProductTotal(selectElement);
            });
        });
    });
</script>