<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Menu\{
    ChildrenMenuRequest,
    StoreMenuRequest,
    UpdateMenuRequest,
    DestroyMenuRequest
};
use App\Http\Services\Menu\{
    MenuService,
    ChildreMenuService,
    StoreMenuService,
    UpdateMenuService,
    DestroyMenuService    
};
use \Illuminate\{
    Database\Eloquent\Collection,
    Http\RedirectResponse
};
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {//dd($request->query());
        return MenuService::execute($request);
    }   
    
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Services\Menu\ChildrenMenuRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function children(ChildrenMenuRequest $request): Collection
    {                
        return ChildreMenuService::execute($request);        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Menu\StoreMenuRequest $request     
     * @return \Illuminate\Http\RedirectResponse     
     */
    public function store(StoreMenuRequest $request): JsonResponse
    {
        return StoreMenuService::execute($request);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Menu\UpdateMenuRequest $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */ 
    public function update(UpdateMenuRequest $request, Menu $menu): JsonResponse
    {
        return UpdateMenuService::execute($request, $menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\Menu\DestroyMenuRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DestroyMenuRequest $request): JsonResponse
    {
        return DestroyMenuService::execute($request);
    }
    
}
