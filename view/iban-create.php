<div class="container row justify-content-center" style="margin-top: 100px;">
    <form action="<?= URL ?>new_iban/save" method="post" class="m-4 col-12 col-sm-8 col-md-6">
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input required type="text" name='vardas' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė</label>
            <input required type="text" name='pavarde' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Asmens kodas</label>
            <input required type="code" name='asmens kodas' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sąskaitos numeris</label>
            <input readonly value= '<?=$randomIban?>' name='IBAN' class="form-control">
        </div>
        <input hidden value="0.00" name='likutis'>
        <button type="submit" class="btn btn-success">Pateikti</button>
    </form>
</div>