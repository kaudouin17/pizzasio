<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                <?= !isset($pizza) ? "Nouvelle Pizza" : "Edition de " . $pizza['name'] ?>
            </h2>
        </div>
        <div class="card-body">
            <!--begin::Stepper-->
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row" id="kt_stepper_example_vertical">
                <!--begin::Aside-->
                <div class="d-flex flex-row-auto w-100 w-lg-300px">
                    <!--begin::Nav-->
                    <div class="stepper-nav flex-center">
                        <!--begin::Step-Name-->
                        <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Choix Nom
                                    </h3>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step-Name-->
                        <?php foreach ($steps as $s): ?>
                            <!--begin::Step-->
                            <div class="stepper-item me-5" data-kt-stepper-element="nav">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number"><?= $s['order'] + 1; ?></span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            <?= $s['name']; ?>
                                        </h3>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Line-->
                                <div class="stepper-line h-40px"></div>
                                <!--end::Line-->
                            </div>
                            <!--end::Step-->
                        <?php endforeach; ?>
                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Url Image
                                    </h3>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                    </div>
                    <!--end::Nav-->
                </div>
                <!--begin::Content-->
                <div class="flex-row-fluid">
                    <!--begin::Form-->
                    <form class="form w-lg-500px mx-auto" novalidate="novalidate" action="<?= isset($pizza) ? site_url("/Pizza/edit") : site_url("/Pizza/result") ?>" method="POST">
                        <input type="hidden" name="id" value="<?= isset($pizza['id']) ? $pizza['id'] : '' ?>">
                        <!--begin::Group-->
                        <div class="mb-5">
                            <!--begin::Step Name-->
                            <div class="flex-column current" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Nom de la pizza</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="name" placeholder="" value="<?= isset($pizza) ? $pizza['name'] : '' ?>" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Step Name-->
                            <!--begin::Step Pate-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Pâte de la pizza</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid selectIngredient" name="pate" data-old-price="0">
                                        <?php foreach ($pate as $pate) : ?>
                                            <option <?= (isset($pizza) && ($pizza['id_pate'] == $pate['id'])) ? 'selected' : '' ?> value="<?= $pate['id']; ?>" data-price="<?= $pate['price']; ?>"><?= $pate['name'] . " (+" . $pate['price'] . "€)" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Step Pate-->
                            <!--begin::Step Base-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Base de la pizza</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid selectIngredient" name="base" data-old-price="0">
                                        <?php foreach ($base as $base) : ?>
                                            <option <?= (isset($pizza) && ($pizza['id_pate'] == $base['id'])) ? 'selected' : '' ?> value="<?= $base['id']; ?>" data-price="<?= $base['price']; ?>"><?= $base['name'] . " (+" . $base['price'] . "€)" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Step Base-->
                            <!--begin::Step Ingredient-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Ingredients de la pizza</label>
                                    <?php if (isset($pizza)) : ?>
                                        <p class="fs-6">Ingrédient de la pizza</p>
                                        <?php foreach ($pizza_ing as $p_ing) : ?>
                                            <div class="btn btn-sm btn-outline me-4 position-relative" data-id="<?= $p_ing->id ?>" data-price="<?= $p_ing->price ?>">
                                                <?= $p_ing->name; ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger removeOldIngredient">
                                                    X
                                                </span>
                                                <input type="hidden" name="ingredients[]" value="<?= $p_ing->id ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <!--begin::Input-->
                                    <div class="d-flex flex-row">
                                        <select class="form-select mb-4 me-4" id="categ">
                                            <?php foreach ($categories as $cat) : ?>
                                                <?php if ($cat['id'] == 10 || $cat['id'] == 13) continue; ?>
                                                <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <a href="#" class="btn btn-success mb-4" id="btn-add">Ajouter</a>
                                    </div>
                                    <div id="emplacement"></div>
                                    <div id="ing_supprimer"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Step Ingredient-->
                            <!--begin::Step Image URL-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Url de l'image</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="img_url" placeholder="" value="<?= isset($pizza) ? $pizza['img_url'] : '' ?>" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Step Image URL-->
                        </div>
                        <!--end::Group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Wrapper-->
                            <div class="me-2">
                                <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                                    Retour
                                </button>
                            </div>
                            <!--end::Wrapper-->
                            <div>
                                <p class="fs-6">Prix de la pizza: <span id="prixtotal">7</span>€</p>
                            </div>
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">
                                        Finir ma pizza
                                    </span>
                                    <span class="indicator-progress">
                                        Patientez... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                    Suivant
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Stepper-->
        </div>
        <div class="card-footer"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Stepper element
        var element = document.querySelector("#kt_stepper_example_vertical");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        $(document).on('click', '.removeOldIngredient', function() {

            var prix = parseFloat($(this).closest('.btn').data('price'))
            var ancienPrix = parseFloat($("#prixtotal").html())

            var id_supprimer = $(this).closest('.btn').data('id')
            $('#ing_supprimer').append(`<input type='hidden' value='${id_supprimer}' name='ing_suppr[]'>`)
            $(this).closest('.btn').remove();
            $("#prixtotal").html((ancienPrix - prix).toFixed(2))
        })

        $(document).on('click', '#removeIngredient', function() {

            var prix = parseFloat($(this).closest('.d-flex').find('.selectIngredient').find('option:selected').data('price'))
            var ancienPrix = parseFloat($('#prixtotal').html())

            $(this).closest('.d-flex').remove();
            $('#prixtotal').text((ancienPrix - prix).toFixed(2))
        });

        $("#btn-add").on('click', function(e) {
            e.preventDefault()
            var id_category = $('#categ').val();
            console.log(id_category);

            $.ajax({
                url: "<?= site_url('/Pizza/AjaxIngredients'); ?>",
                type: "GET",
                data: {
                    idCateg: id_category
                },
                success: function(data) {
                    let select = `<div class="d-flex flex-row "><select class="selectIngredient form-select mb-4 me-4" data-old-price="0.0"  name="ingredients[]">`
                    data.forEach((ing) => {
                        var option = "<option data-price=" + ing.price + " value=" + ing.id + " > " + ing.name + " (+" + ing.price + ") </option>";
                        select += option;
                    });
                    select += "</select><div class='flex-col'><i class='fa-solid fa-x me-4' id='removeIngredient' role='button'></i></div></div>";

                    $("#emplacement").append(select)
                    $("#emplacement").find('.selectIngredient').last().trigger('change');
                },
                error: function(hxr, status, error) {
                    console.log(error);
                }
            });
        });
        $(document).on('change', '.selectIngredient', function(e) {
            console.log($(this).find('option:selected').data('price'));
            var price = parseFloat($("#prixtotal").html());
            var selectedPrice = parseFloat($(this).find('option:selected').data('price'));
            var oldPrice = parseFloat($(this).data('old-price'));
            $("#prixtotal").html((price + selectedPrice - oldPrice).toFixed(2));
            $(this).data('old-price', selectedPrice);
        });
    })
    $(document).ready(function() {
        var dataTable = $('#allPizzaTable').DataTable({
            "language": {
                "url": '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 50,
            "ajax": {
                "url": "<?= site_url('/Pizza/SearchPizza'); ?>",
                "type": "POST"
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                {
                    "data": "active",
                    "render": function(data) {
                        return (data === "1" ? 'Oui' : 'Non');
                    }
                },
                { "data": 'price' },
                {
                    "data": 'img_url',
                    "render": function(data, type, row) {
                        return `<a href="${row.img_url}" data-toggle="lightbox"><img style="width:50px; height:auto" class="img-thumbnail" src="${row.img_url}"></a>`;
                    }
                },
                { // New column for the checkbox
                    "data": 'active',
                    "render": function(data, type, row) {
                        return `<input type="checkbox" class="toggle-active" data-id="${row.id}" ${data === "1" ? 'checked' : ''}>`;
                    }
                },
                {
                    "data": 'id',
                    "sortable": false,
                    "render": function(data, type, row) {
                        return `<i class="fa-solid fa-eye me-4 view" data-id="${row.id}"></i>`;
                    }
                },
                {
                    "data": 'id',
                    "sortable": false,
                    "render": function(data, type, row) {
                        return `<a href="<?= site_url('/Pizza/edit/'); ?>${row.id}"><i class="fa-solid fa-pencil me-4"></i>Éditer</a>`;
                    }
                }
            ],
            "order": [[0, "asc"]]
        });

        // Event listener for checkbox toggle
        $(document).on('change', '.toggle-active', function() {
            var id = $(this).data('id');
            var active = $(this).is(':checked') ? '1' : '0';

            $.ajax({
                url: "<?= site_url('/Pizza/ToggleActive'); ?>",
                type: "POST",
                data: {
                    id: id,
                    active: active
                },
                success: function(response) {
                    console.log(response);
                    dataTable.ajax.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>