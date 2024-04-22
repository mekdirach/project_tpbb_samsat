<div class="card">
    <div class="card-body">
        <div class="row justify-content-start d-flex">
            <div class="col-md-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="75" viewBox="0 0 70 75" fill="none">
                    <path
                        d="M38.4597 4.10237C30.4893 6.34402 22.1528 8.68822 19.9697 9.30358L15.9699 10.4317V17.8746V25.3321H23.8816H31.7933V47.9684V70.6046H29.5956H27.3979V50.166V29.7275L18.2116 29.7568L9.01055 29.8007L8.96659 50.1954L8.93729 70.6046H4.46865H0V72.8023V75H34.5771H69.1541V72.8023V70.6046H66.8832H64.6122V43.6462V16.6878H61.0959H57.5796V43.6462V70.6046H55.3819H53.1842V35.295C53.1842 15.8674 53.1403 -0.0146408 53.0816 7.62939e-06C53.0084 0.0146561 46.4446 1.84607 38.4597 4.10237ZM44.6132 24.9658V29.3612L42.4595 29.4052L40.2911 29.4491V24.9658V20.4825L42.4595 20.5265L44.6132 20.5704V24.9658ZM20.3653 41.1555V45.5509H18.1676H15.9699V41.1555V36.7601H18.1676H20.3653V41.1555ZM44.6865 41.1555V45.5509H42.4888H40.2911V41.1555V36.7601H42.4888H44.6865V41.1555ZM20.3653 57.2719V61.6673H18.1676H15.9699V57.2719V52.8765H18.1676H20.3653V57.2719ZM44.6865 57.2719V61.6673H42.4888H40.2911V57.2719V52.8765H42.4888H44.6865V57.2719Z"
                        fill="black" />
                </svg>
            </div>
            <div class="col-md-auto">
                <div class="row m-0">
                    <h6>Nomor Polisi</h6>
                </div>
                <div class="row m-0">
                    <p>Jenis Kendaraan</p>
                </div>
                <div class="row m-0">
                    <p>Tahun Pajak</p>
                </div>
            </div>
            <div class="col-md-auto ml-3">
                <div class="row m-0">
                    <h6> : <?php echo e($record->nomor_polisi); ?></h6>
                </div>
                <div class="row m-0">
                    <p> : <?php echo e($record->jenis_kendaraan); ?></p>
                </div>
                <div class="row m-0">
                    <p> : <?php echo e($record->tahun_pajak); ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <div class="card-body" style="border-radius: 5px; background: rgba(224, 229, 232, 0.75);">
                    <div class="row">
                        <div class="col-md-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"
                                fill="none">
                                <path
                                    d="M22.008 0.049057C21.8234 0.0930138 2.0429 8.98106 1.26047 9.36788C0.469246 9.7547 0.10001 10.2734 0.0120962 11.0998C-0.0758172 11.9174 0.478037 12.8053 1.26926 13.1394C1.70883 13.324 43.2743 13.324 43.7139 13.1394C44.5051 12.8053 45.0589 11.9174 44.971 11.0998C44.9095 10.5371 44.6457 10.0009 44.2765 9.70195C44.0128 9.49096 24.5663 0.682034 23.3004 0.198509C22.7817 -0.00369167 22.4037 -0.0476484 22.008 0.049057Z"
                                    fill="black" />
                                <path
                                    d="M4.33715 15.179C3.86242 15.3372 3.58988 15.7065 3.58988 16.19C3.58988 16.4625 3.65142 16.5944 3.88879 16.8318C4.15253 17.0955 4.24044 17.1307 4.63605 17.1307H5.08441V26.3528V35.5749L4.52177 35.6101C3.79209 35.654 3.22065 35.9969 2.84262 36.5947C2.3591 37.3771 2.51734 38.4673 3.21186 39.1266C3.78329 39.6717 2.32393 39.6365 22.5089 39.6365H40.9091L41.3047 39.4255C43.1861 38.4321 42.4652 35.5925 40.3377 35.5925H39.8981V26.3616V17.1307H40.3289C41.5245 17.1307 41.7883 15.6273 40.663 15.2054C40.3904 15.0999 4.65364 15.0823 4.33715 15.179ZM15.2824 26.3616V35.5925H12.2494H9.21634V26.3616V17.1307H12.2494H15.2824V26.3616ZM25.5507 26.3792L25.5682 35.5925H22.4913H19.4143V26.3616V17.1307L22.4737 17.1482L25.5243 17.1746L25.5507 26.3792ZM35.7662 26.3616V35.5925H32.6892H29.6123V26.4231C29.6123 21.3769 29.6386 17.2186 29.6738 17.1922C29.7002 17.157 31.0892 17.1307 32.7508 17.1307H35.7662V26.3616Z"
                                    fill="black" />
                                <path
                                    d="M1.65576 40.9465C0.627176 41.1575 -0.102505 42.1509 0.0117823 43.1619C0.0733217 43.6894 0.249149 44.0235 0.662342 44.4279C1.29532 45.0433 -0.357453 44.9993 22.4649 44.9993C37.208 44.9993 43.1861 44.9729 43.4586 44.9026C44.3026 44.6916 44.9356 43.8476 44.9356 42.9333C44.9356 42.0982 44.496 41.4212 43.7223 41.0696C43.3883 40.9201 42.4124 40.9113 22.6671 40.9025C11.2823 40.8938 1.8228 40.9113 1.65576 40.9465Z"
                                    fill="black" />
                            </svg>
                        </div>
                        <div class="col-md-auto">
                            <div class="row">
                                <h6>Nomor Rekening</h6>
                            </div>
                            <div class="row">
                                <p><?php echo e($record->rekening_external); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body" style="border-radius: 5px; background: rgba(224, 229, 232, 0.75);">
                    <div class="row">
                        <div class="col-md-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="45" viewBox="0 0 46 45"
                                fill="none">
                                <path
                                    d="M20.3798 0.0564499C16.1702 0.487972 12.3393 1.99391 8.91352 4.54783C7.80389 5.38446 5.40849 7.77105 4.58947 8.87188C2.41423 11.7781 1.01398 14.9485 0.397515 18.3126C-0.782573 24.6886 0.679327 30.9061 4.58947 36.1372C5.40849 37.238 7.80389 39.6246 8.91352 40.4613C12.1191 42.8567 15.677 44.3098 19.7633 44.891C20.8025 45.0407 24.2635 45.0319 25.3555 44.891C30.4545 44.1865 35.0164 41.9232 38.4862 38.3829C39.5958 37.2556 39.86 36.9562 40.5645 36.0227C42.8543 33.002 44.3514 29.3033 44.9238 25.2786C45.0735 24.2394 45.0735 20.7696 44.9238 19.7305C44.413 16.1726 43.1625 12.7996 41.3131 10.0432C37.6936 4.63589 32.1278 1.13086 25.6637 0.170933C24.5805 0.0124168 21.4542 -0.0580368 20.3798 0.0564499ZM23.3564 8.27303C23.5501 8.3699 23.7967 8.61649 23.9112 8.81904L24.1226 9.18011V15.4416V21.7119L27.9975 24.8119C30.9037 27.1368 31.9076 27.9823 32.0221 28.22C32.1014 28.3962 32.1718 28.7396 32.1718 28.995C32.1718 29.8405 31.4849 30.5186 30.6131 30.5186C30.3753 30.5186 30.0582 30.4569 29.9085 30.3865C29.5122 30.1927 21.3925 23.6582 21.1812 23.3588C20.9962 23.1122 20.9962 23.0065 20.9698 16.1462L20.9522 9.18892L21.1459 8.84546C21.4542 8.29065 22.1587 7.94719 22.7575 8.04406C22.9073 8.06167 23.1715 8.16735 23.3564 8.27303Z"
                                    fill="black" />
                            </svg>
                        </div>
                        <div class="col-md-auto">
                            <div class="row">
                                <h6>Periode Berjalan</h6>
                            </div>
                            <div class="row">
                                <p>1 dari 3 Bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body" style="border-radius: 5px; background: rgba(224, 229, 232, 0.75);">
                    <div class="row">
                        <div class="col-md-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="51" height="45" viewBox="0 0 51 45"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.5 2.92211V42.0779C0.5 43.6461 2.04704 45 4.10387 45H46.7664C47.8511 45 48.6015 44.7291 49.2187 44.2376C49.7194 43.8387 50.3709 42.9334 50.3709 42.0779V3.01924C50.3709 1.46762 48.9027 0 47.3516 0C35.6284 0 15.3984 0 3.52037 0C2.59226 0 1.86703 0.484644 1.3864 0.982993C0.928626 1.45791 0.501144 2.22602 0.501144 2.92211H0.5ZM3.66554 12.6262H47.2042V41.819H3.66554V12.6262Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.3511 24.8377C17.3259 25.1423 17.2539 25.1835 17.2539 25.5195V29.9024C17.2539 30.3573 17.4814 30.5842 17.9357 30.5842C19.1724 30.5842 22.822 30.7099 23.7799 30.487C23.9988 29.5475 23.877 26.3116 23.877 25.1298C23.877 24.9017 23.7153 24.7406 23.4873 24.7406C22.566 24.7406 17.8791 24.6326 17.3511 24.8377Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.99951 24.8377C7.97436 25.1423 7.90234 25.1835 7.90234 25.5195V29.9024C7.90234 30.3573 8.12924 30.5842 8.58415 30.5842C9.82145 30.5842 13.4705 30.7099 14.4283 30.487C14.6472 29.5475 14.5255 26.3116 14.5255 25.1298C14.5255 24.9017 14.3637 24.7406 14.1357 24.7406C13.2144 24.7406 8.52758 24.6326 7.99951 24.8377Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.6035 17.2399V21.6233C26.6035 21.9588 26.6755 22.0005 26.7007 22.3051C27.6682 22.5303 31.5676 22.4023 32.8369 22.4023C33.0649 22.4023 33.2266 22.2406 33.2266 22.0125V16.9479C33.2266 16.6484 32.9415 16.5581 32.6426 16.5581H27.2853C26.8304 16.5581 26.6035 16.785 26.6035 17.2399Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M35.9537 17.2399V21.6233C35.9537 21.9588 36.0257 22.0005 36.0508 22.3051C37.0184 22.5303 40.9183 22.4023 42.1871 22.4023C42.4151 22.4023 42.5763 22.2406 42.5763 22.0125V16.9479C42.5763 16.6484 42.2911 16.5581 41.9922 16.5581H36.6349C36.1806 16.5581 35.9531 16.785 35.9531 17.2399H35.9537Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.7007 24.8383C26.6755 25.1429 26.6035 25.1841 26.6035 25.5201V29.9029C26.6035 30.3579 26.8304 30.5847 27.2853 30.5847H32.6426C32.9415 30.5847 33.2266 30.4944 33.2266 30.195V25.1298C33.2266 24.9017 33.0649 24.7406 32.8369 24.7406C31.9156 24.7406 27.2287 24.6326 26.7007 24.8377V24.8383Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M36.0503 24.8383C36.0251 25.1429 35.9531 25.1841 35.9531 25.5201V29.9029C35.9531 30.3579 36.1806 30.5847 36.6349 30.5847H41.9922C42.2911 30.5847 42.5762 30.4944 42.5762 30.195V25.1298C42.5762 24.9017 42.4145 24.7406 42.1871 24.7406C41.2658 24.7406 36.5789 24.6326 36.0508 24.8377L36.0503 24.8383Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M26.6035 33.5067V37.9873C26.6035 38.3154 26.7755 38.6691 27.0904 38.6691H32.8374C33.0655 38.6691 33.2272 38.5074 33.2272 38.2799V33.2147C33.2272 32.9152 32.942 32.825 32.6431 32.825H27.091C26.7761 32.825 26.6041 33.1787 26.6041 33.5067H26.6035Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.90234 33.5067V37.9873C7.90234 38.3154 8.07437 38.6691 8.38926 38.6691H14.1363C14.3643 38.6691 14.526 38.5074 14.526 38.2799V33.2147C14.526 32.9152 14.2409 32.825 13.942 32.825H8.38984C8.07494 32.825 7.90292 33.1787 7.90292 33.5067H7.90234Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.2539 33.5072V37.9878C17.2539 38.3159 17.4259 38.6696 17.7408 38.6696H23.4878C23.7159 38.6696 23.8776 38.5079 23.8776 38.2804V33.2152C23.8776 32.9157 23.5918 32.8254 23.293 32.8254H17.7408C17.4259 32.8254 17.2539 33.1792 17.2539 33.5072Z"
                                    fill="black" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M35.9531 33.5067V37.9873C35.9531 38.3154 36.1251 38.6691 36.44 38.6691H42.1871C42.4151 38.6691 42.5763 38.5074 42.5763 38.2799V33.2147C42.5763 32.9152 42.2911 32.825 41.9922 32.825H36.44C36.1251 32.825 35.9531 33.1787 35.9531 33.5067Z"
                                    fill="black" />
                            </svg>
                        </div>
                        <div class="col-md-auto">
                            <div class="row">
                                <h6>Tgl Rencana Bayar</h6>
                            </div>
                            <div class="row">
                                <p><?php echo e($record->pajak_tgl_rencana_bayar); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body" style="border-radius: 5px; background: rgba(224, 229, 232, 0.75);">
                    <div class="row">
                        <div class="col-md-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                viewBox="0 0 45 45" fill="none">
                                <path
                                    d="M22.008 0.049057C21.8234 0.0930138 2.0429 8.98106 1.26047 9.36788C0.469246 9.7547 0.10001 10.2734 0.0120962 11.0998C-0.0758172 11.9174 0.478037 12.8053 1.26926 13.1394C1.70883 13.324 43.2743 13.324 43.7139 13.1394C44.5051 12.8053 45.0589 11.9174 44.971 11.0998C44.9095 10.5371 44.6457 10.0009 44.2765 9.70195C44.0128 9.49096 24.5663 0.682034 23.3004 0.198509C22.7817 -0.00369167 22.4037 -0.0476484 22.008 0.049057Z"
                                    fill="black" />
                                <path
                                    d="M4.33715 15.179C3.86242 15.3372 3.58988 15.7065 3.58988 16.19C3.58988 16.4625 3.65142 16.5944 3.88879 16.8318C4.15253 17.0955 4.24044 17.1307 4.63605 17.1307H5.08441V26.3528V35.5749L4.52177 35.6101C3.79209 35.654 3.22065 35.9969 2.84262 36.5947C2.3591 37.3771 2.51734 38.4673 3.21186 39.1266C3.78329 39.6717 2.32393 39.6365 22.5089 39.6365H40.9091L41.3047 39.4255C43.1861 38.4321 42.4652 35.5925 40.3377 35.5925H39.8981V26.3616V17.1307H40.3289C41.5245 17.1307 41.7883 15.6273 40.663 15.2054C40.3904 15.0999 4.65364 15.0823 4.33715 15.179ZM15.2824 26.3616V35.5925H12.2494H9.21634V26.3616V17.1307H12.2494H15.2824V26.3616ZM25.5507 26.3792L25.5682 35.5925H22.4913H19.4143V26.3616V17.1307L22.4737 17.1482L25.5243 17.1746L25.5507 26.3792ZM35.7662 26.3616V35.5925H32.6892H29.6123V26.4231C29.6123 21.3769 29.6386 17.2186 29.6738 17.1922C29.7002 17.157 31.0892 17.1307 32.7508 17.1307H35.7662V26.3616Z"
                                    fill="black" />
                                <path
                                    d="M1.65576 40.9465C0.627176 41.1575 -0.102505 42.1509 0.0117823 43.1619C0.0733217 43.6894 0.249149 44.0235 0.662342 44.4279C1.29532 45.0433 -0.357453 44.9993 22.4649 44.9993C37.208 44.9993 43.1861 44.9729 43.4586 44.9026C44.3026 44.6916 44.9356 43.8476 44.9356 42.9333C44.9356 42.0982 44.496 41.4212 43.7223 41.0696C43.3883 40.9201 42.4124 40.9113 22.6671 40.9025C11.2823 40.8938 1.8228 40.9113 1.65576 40.9465Z"
                                    fill="black" />
                            </svg>
                        </div>
                        <div class="col-md-auto">
                            <div class="row">
                                <h6>Total Pembayaran</h6>
                            </div>
                            <div class="row">
                                <p>Rp <?php echo e(number_format($record->pajak_total_tagihan)); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nav-tabs-top nav-responsive-xl mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#navs-top-responsive-link-1">Informasi T-Samsat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#navs-top-responsive-link-2">Riwayat Autoblokir</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-top-responsive-link-1">
            <div class="card-body">
                <div class="row">
                    <h5 class="mb-4">Informasi T-Samsat</h5>
                </div>
                <div class="row">
                    <div class="col-3 mt">
                        <div class="row"><h6 class="mb-0">Nama Nasabah</h6></div>
                        <div class="row"><p><?php echo e($record->nm_pemilik); ?></p></div>

                        <div class="row"><h6 class="mb-0">Nama Pemda</h6></div>
                        <div class="row"><p><?php echo e($record->mp_mp_nama); ?></p></div>

                        <div class="row"><h6 class="mb-0">Jenis Registrasi</h6></div>
                        <div class="row"><p><?php echo e($record->registrasi_jenis); ?> </p></div>

                        <div class="row"><h6 class="mb-0">Tgl. Registrasi</h6></div>
                        <div class="row"><p><?php echo e($record->registrasi_tgl); ?> </p></div>

                        <div class="row"><h6 class="mb-0">Nomor Mesin</h6></div>
                        <div class="row"><p><?php echo e($record->no_mesin); ?></p></div>
                    </div>
                    <div class="col-3">
                        <div class="row"><h6 class="mb-0">Provinsi</h6></div>
                        <div class="row"><p><?php echo e($record->mp_mp_nama); ?></p></div>

                        <div class="row"><h6 class="mb-0">Informasi Lain</h6></div>
                        <div class="row"><p><?php echo e($record->informasi_lain); ?></p></div>

                        <div class="row"><h6 class="mb-0">No. HP</h6></div>
                        <div class="row"><p><?php echo e($record->notif_phone); ?></p></div>

                        <div class="row"><h6 class="mb-0">Email</h6></div>
                        <div class="row"><p><?php echo e($record->notif_email); ?></p></div>

                        <div class="row"><h6 class="mb-0">Jenis Kendaraan</h6></div>
                        <div class="row"><p><?php echo e($record->jenis_kendaraan); ?></p></div>
                    </div>
                    <div class="col-3">
                        <div class="row"><h6 class="mb-0">Tanggal Awal Blokir</h6></div>
                        <div class="row"><p><?php echo e($record->autoblokir_awal_tgl); ?></p></div>

                        <div class="row"><h6 class="mb-0">Tanggal Akhir Blokir</h6></div>
                        <div class="row"><p><?php echo e($record->autoblokir_akhir_tgl); ?></p></div>

                        <div class="row"><h6 class="mb-0">Nominal Pembayaran</h6></div>
                        <div class="row"><p>Rp <?php echo e(number_format($record->pajak_total_tagihan)); ?></p></div>

                        <div class="row"><h6 class="mb-0">Nominal Setoran</h6></div>
                        <div class="row"><p>Rp <?php echo e(number_format($record->nominal_setoran)); ?></p></div>

                        <div class="row"><h6 class="mb-0">Diskon Pembayaran</h6></div>
                        <div class="row"><p>Rp <?php echo e(number_format($record->pbb_c_diskon)); ?></p></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-top-responsive-link-2">
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Tanggal Autoblokir</th>
                            <th>Nominal</th>
                            <th>Status Autoblokir</th>
                            <th>Deskripsi Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/t-samsat/bjb-tsamsat/list-tabungan/content/detail.blade.php ENDPATH**/ ?>