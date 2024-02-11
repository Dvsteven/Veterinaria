document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
    const cartItemsList = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    let cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
        const productCard = event.target.closest('.product-card');
        const productName = productCard.dataset.product;
        const productPrice = parseFloat(productCard.dataset.price);

        // Añadir producto al carrito
        cart.push({ name: productName, price: productPrice });

        // Actualizar la mini sección del carrito
        updateCart();
    }

    function updateCart() {
        // Limpiar la lista de items del carrito
        cartItemsList.innerHTML = '';

        // Calcular el total y mostrar los items en el carrito
        let total = 0;
        cart.forEach(item => {
            const listItem = document.createElement('li');
            listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            cartItemsList.appendChild(listItem);

            total += item.price;
        });

        // Actualizar el total en la sección del carrito
        cartTotal.textContent = total.toFixed(2);
    }  

});
