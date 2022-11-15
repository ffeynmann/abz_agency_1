<?php

namespace App\Services;

use App\Exceptions\Api\V1\UsersPaginatorPageNotFound;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UsersPaginator
{
    private int $defaultPerPage = 5;

    private array $params;
    private int $total;
    public int $pages;

    private Builder $builder;

    public function __construct(
        private int|null $page = null,
        private int|null $offset = null,
        private int|null $count = null
    ){
        //params for build query for prev|next urls
        $this->params = compact(['page', 'offset', 'count']);

        $this->page  = max($page, 1);
        $this->count = $this->count ?? $this->defaultPerPage;

        $this->builder = User::query()->orderBy('id');
    }

    public function getData(): array
    {
        $this->countTotal();
        $this->countPages();
        $this->checkPageExists();
        $this->setOffsetAndLimit();

        $users = UserResource::collection($this->builder->with('position', 'photo')->get());

        return [
            'success'     => true,
            'page'        => $this->page,
            'total_pages' => $this->pages,
            'total_users' => $this->total,
            'count'       => $users->count(),
            'links'       => [
                'next_url' => $this->getNextPageUrl(),
                'prev_url' => $this->getPrevPageUrl()
            ],
            'users'       => $users
        ];
    }

    private function countTotal()
    {
        $this->total = $this->builder->count();
    }

    private function countPages()
    {
        $this->pages = ceil($this->total / $this->count);
    }

    private function checkPageExists()
    {
        if($this->page > $this->pages) {
            throw new UsersPaginatorPageNotFound();
        }
    }

    private function setOffsetAndLimit()
    {
        $this->builder->offset($this->getOffset());
        $this->builder->limit($this->count);
    }

    private function getOffset()
    {
        if(!is_null($this->offset)) {
            return $this->offset;
        }

        return $this->page * $this->count - $this->count;
    }

    private function getNextPageUrl()
    {
        if($this->page == $this->pages) {
            return null;
        }

        return route('api.v1.users.index', array_merge($this->params, ['page' => $this->page + 1]));
    }

    private function getPrevPageUrl()
    {
        if($this->page == 1) {
            return null;
        }

        return route('api.v1.users.index', array_merge($this->params, ['page' => $this->page - 1]));
    }
}
