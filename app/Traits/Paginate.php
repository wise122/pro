<?php

namespace App\Traits;

trait Paginate
{
    function getPrevious($currentPage, $previouspage)
    {
        if (!function_exists('getPrevious')) {
            if ($currentPage <= 1)
                return '<li class="page-item">
                            <a class="page-link pageLinkPrev" href="javascript:void(0)">
                                <i class="fa-solid fa-arrow-left fa-xl"></i>
                            </a>
                        </li>';
            else
                return '<li class="page-item">
                            <a class="page-link pageLinkPrev paginate" href="javascript:void(0)" data-page="' . $previouspage . '">
                                <i class="fa-solid fa-arrow-left fa-xl"></i>
                            </a>
                        </li>';
        }
    }

    function getNext($currentPage, $lastPage, $nextpage)
    {
        if (!function_exists('getNext')) {
            if ($currentPage >= $lastPage)
                return '<li class="page-item">
                            <a class="page-link pageLinkNext" href="javascript:void(0)">
                                <i class="fa-solid fa-arrow-right fa-xl"></i>
                            </a>
                        </li>';
            else
                return '<li class="page-item">
                            <a class="page-link pageLinkNext paginate" href="javascript:void(0)" data-page="' . $nextpage . '">
                                <i class="fa-solid fa-arrow-right fa-xl"></i>
                            </a>
                        </li>';
        }
    }
}
