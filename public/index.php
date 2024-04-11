<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Freetimers - Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Freetimers - Test">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div class="container p-5">
            <h1 class="mb-4">Freetimers Test</h1>
            <div class="row mb-4">
                <div class="col-md-3">
                    Select Length/Width Unit:
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="length_width_unit" value="metres" checked="checked"> Metres
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="length_width_unit" value="feet"> Feet
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="length_width_unit" value="yards"> Yards
                    </label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    Select Depth Unit:
                </div>
                <div class="col-md-6">
                    <label>
                        <input type="radio" name="depth_unit" value="centimetres" checked="checked"> Centimetres
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="depth_unit" value="inches"> Inches
                    </label>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    Set Dimensions:
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            Length: <input type="number" name="length" class="form-control form-control-sm" placeholder="Length">
                        </div>
                        <div class="col-md-3">
                            Width: <input type="number" name="width" class="form-control form-control-sm" placeholder="Width">
                        </div>
                        <div class="col-md-3">
                            Depth: <input type="number" name="depth" class="form-control form-control-sm" placeholder="Depth">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <input id="calculate-btn" class="btn btn-primary" value="Calculate Bags Needed">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-9">
                    <h4>Results</h4>
                    <div id="result-div" class="mb-3"></div>
                    <input id="add-to-cart" class="btn btn-success d-none" value="Add To Cart">
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>