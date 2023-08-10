<?php

/**
 * https://github.com/bmewburn/vscode-intelephense/issues/2079
 * 
 * This file was created to fix intelephense issue with livewire.
 * 
 */

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    /** @return static */
    public function layout();
    public function title();
}
