<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body>
        <section class="container py-5 justify-content-center d-flex">
            <div class="col-md-4">
                <form action="" method="post">
                    <h4 class="">Enter Details</h4><br>
                    @csrf
                    <input type="text" name="name" class="form-control mb-3">
                    <input type="number" name="amount" class="form-control mb-3" placeholder="Enter Amount">
                    <select class="js-example-basic-single form-control" name="state[]" multiple="multiple">
                        <option value="Trans fare">Trans fare</option>
                        <option value="Fuel">Fuel</option>
                        <option value="Hotel bills">Hotel bills</option>
                    </select>
            
                    <button type="submit" class="btn btn-sm btn-success px-5" style="margin-top: 20px;">Submit</button>
                </form>
            </div>
        </section>

        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }

                var baseUrl = "/user/pages/images/flags";
                var $state = $(
                    '<span><img class="img-flag" /> <span></span></span>'
                );

                // Use .text() instead of HTML string concatenation to avoid script injection issues
                $state.find("span").text(state.text);
                $state.find("img").attr("src", baseUrl + "/" + state.element.value.toLowerCase() + ".png");

                return $state;
                };

                $(".js-example-templating").select2({
                templateSelection: formatState
            });
        </script>
    </body>
</html>