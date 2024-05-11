@php
$roleUID=auth()->user()->role;
$menulist=\App\Models\MMenu::where('roleid', $roleUID)->where('parentmenuid', 0)->where('sidemenustatus',1)->where('isactive',1)->orderBy('sequenceorder','ASC')->get();
@endphp
<div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                @foreach($menulist as $menu)
                <?php 
    $currentUrl = url()->current();

    $menuurl = url('').'/'.$menu->url;
    $isActive = $currentUrl == $menuurl;
    $hasActiveChild = false;
    ?>
     <?php 
    $childlist = \App\Models\MMenu::where('parentmenuid', $menu->id)->where('roleid', $roleUID)->orderBy('sequenceorder')->get();
    ?>
    @foreach($childlist as $childmenu)
        <?php 
        $childmenuurl = url('').'/'.$childmenu->url;
        $isChildActive = $currentUrl == $childmenuurl;
        if ($isChildActive) {
            $hasActiveChild = true;
        }
        ?>
    @endforeach
    @if ($menu->parentmenuid == 0 && $menu->submenu == 0)
                    <li>
                        <a href="<?php echo url(''); ?>/{{$menu->url}}" class="side-menu {{ $isActive ? 'side-menu--active' : '' }}">
                            <div class="side-menu__icon"> {!!$menu->icon!!} </div>
                            <div class="side-menu__title">
                            {{$menu->name}}
                            </div>
                        </a>
                    </li>
                    @endif
                    @if ($menu->parentmenuid ==0 && $menu->submenu ==1)
                    
                    <li>
                        <a href="#" class="side-menu {{ $hasActiveChild ? 'side-menu--active side-menu--open' : '' }}">
                            <div class="side-menu__icon"> {!!$menu->icon!!} </div>
                            <div class="side-menu__title">
                            {{$menu->name}} <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
           
           
           
                        <ul class="{{ $hasActiveChild ? 'side-menu__sub-open' : '' }}">
                        <?php

$childlist = \App\Models\MMenu::where('parentmenuid', $menu->id)->where('roleid', $roleUID)->orderBy('sequenceorder')->get();
?>
@foreach($childlist as $childmenu)
<?php 
$childmenuurl = url('').'/'.$childmenu->url;
$currentUrl;
?>
<li>
                                <a href="<?php echo url(''); ?>/{{$childmenu->url}}" class="side-menu <?php if($currentUrl == $childmenuurl){ echo 'side-menu--active'; }else{ echo ''; } ?>">
                                    <div class="side-menu__icon"> {!!$childmenu->icon!!} </div>
                                    <div class="side-menu__title"> {{$childmenu->name}} </div>
                                </a>
                            </li>

@endforeach
</ul>
@endif
                      
                    </li>
                    @endforeach
                </ul>
            </nav>
            <!-- END: Side Menu -->