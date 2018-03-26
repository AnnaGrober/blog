<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Детали</title>
    <script src="../bootstrap/dist/js/jquery.min.js"></script>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="noUiSlider.11.0.3/nouislider.min.css" rel="stylesheet">
    <link href="../bootstrap/form-validation.css" rel="stylesheet">

    <link href="../styles/styles2.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid header">
    @include ('layouts.headerNavigetion')

            <form >
            <div class="row text-left justify-content-center">
                <div class="col-md-8 ">
                    <h4 class="mb-3">Введите данные для размещения объявления</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category">Категория</label>
                                <select class="custom-select d-block w-100" id="category" required>
                                    <option value="">Выберите категорию</option>
                                    <option>Другая</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputCategory">Введите категорию</label>
                                <input type="text" class="form-control" id="inputCategory" placeholder="" value="" required>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                                <label for="language">Язык</label>
                                <select class="custom-select d-block w-100" id="language" required>
                                    <option value="">Выберите язык</option>
                                    <option>Другой</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputLanguage">Введите язык</label>
                                <input type="text" class="form-control" id="inputLanguage" placeholder="" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4 col-xs-4">
                                <lable for="VoidInputPrice">Цена  </lable>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-xs-5">
                                <div class="example">
                                    <div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>

                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 ">
                                min<select id="input-select"></select>
                                max<input type="number" min="0" max="10000" step="100" id="input-number">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
            </form>
    </div>
    @include ('layouts.footerNavigation')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../bootstrap/dist/js/jquery.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>