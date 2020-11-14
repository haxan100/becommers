<?php
defined('BASEPATH') or exit('No direct script access allowed');
$all = isset($all) ? $all : 0;
$search = isset($search) ? $search : 0;
$sort = isset($sort) ? $sort : 0;
$filter = isset($filter) ? $filter : 0;
$date = isset($date) ? $date : 0;
?>
<!-- Searh, Sort, Filter -->
<div class="py-2">
    <?php
    if ($all == 1 || $search == 1) {
    ?>
        <div class="row py-1" style="background-color: white">
            <div class="col py-1 px-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text biz-bg-w-3 biz-border-w-3 lighten-3 biz-max-h-2_5" id="basic-text1" for="_bizSearch">
                            <i class="fas fa-search biz-fabiz-text-w-1 biz-text-1_5r"></i>
                        </label>
                    </div>
                    <input class="_bizSearch form-control form-search biz-no-focus biz-border-w-3 biz-bg-w-3 pl-0 biz-text-13 biz-max-h-2_5" type="text" placeholder="Search.." aria-label="Search" name="_bizSearch" id="_bizSearch" stlye>
                </div>
            </div>

        </div>
    <?php
    } // tutup if($all == 1 || $search == 1)
    if ($all == 1 || $sort == 1 || $filter == 1) {
    ?>
        <div class="row py-1" style="background-color: white">
            <?php
            if ($all == 1 || $sort == 1) {
            ?>
                <div class="col">
                    <button class="btn btn-block biz-no-shadow biz-text-13 no-text-transform biz-bg-w-3 biz-text-w-5 biz-rad-10 text-left px-3 py-2 _bizSelect" data-toggle="dropdown" data-value="default" id="btnSort">
                        <span class="_bizSelectText">Sort By</span>
                        <span class="fas fa-chevron-down biz-text-20 float-right biz-text-w-1"></span>
                    </button>
                    <div class="col-10 dropdown-menu">
                        <?php
                        $no = 1;
			// var_dump(json_encode($arrSort));die();
                        
                        foreach ($arrSort as $row) {
                            // var_dump(count($arrSort)); die();
                            if ($no < (count($arrSort))) {
                        ?>
                        <?php 
                        
                        // var_dump($row['text']) ?>
                                <a class="dropdown-item _bizOption _bizSortPil" href="#" data-value="<?= $row['value']; ?>"><?= $row['text']; ?></a>

                        <?php }
                            $no++;
                        } ?>

                        <a class="dropdown-item _bizOption" href="#" data-value="w-0">Terlama</a>
                    </div>
                </div>
            <?php
            } // tutup if($all == 1 || $sort == 1)
            if ($all == 1 || $filter == 1) {
            ?>
                <div class="col">
                    <button class="btn btn-block biz-no-shadow biz-text-13 no-text-transform biz-bg-w-3 text-white biz-rad-10 text-left px-3 py-2 _bizSelect" data-toggle="dropdown" data-value="default" id="btnFilter">
                        <span class="_bizSelectText biz-text-w-5">Filter</span>
                        <span class="fas fa-chevron-down biz-text-20 float-right biz-text-w-1"></span>
                    </button>
                    <div class="col-10 dropdown-menu">


                        <?php
                        $no = 1;
                        foreach ($arrFilter as $row) {
                            // var_dump(count($arrFilter)); die();
                            // if($no < (count($arrFilter))){
                        ?>
                            <a class="dropdown-item _bizOption _bizFilterPil" href="#" data-value="<?= $row['value']; ?>" data-tipe="<?= $row['id_tipe_produk']; ?>"><?= $row['text']; ?></a>

                        <?php }
                        $no++; ?>

                    </div>
                </div>
            <?php
            } // tutup if($all == 1 || $filter == 1)
            ?>
        </div>
    <?php
    } // tutup if($all == 1 || $sort == 1 || $filter == 1)
    if ($all == 1 || $date == 1) {
    ?>
        <div class="row py-1 biz-text-17">
            <span class="col biz-bg-w-2 biz-rad-10 ml-3 pl-0 mr-3 biz-max-h-2_5">
                <div class="input-group biz-max-h-2_5">
                    <input type="text" name="_datepicker" id="_datepicker" placeholder="Rentang Tanggal" class="_datepicker form-control biz-max-h-2_5 border-0 biz-text-13 biz-no-focus" />
                    <span class="input-group-append biz-max-h-2_5">
                        <label class="input-group-text biz-bg-w-2 border-0 biz-text-w-1" for="_datepicker">
                            <span class="fa fa-calendar-alt"></span>
                        </label>
                    </span>
                </div>
            </span>
        </div>
    <?php
    } // tutup if($all == 1 || $date == 1)
    ?>
</div>