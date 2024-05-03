<?php

namespace Leugin\KitchenCore\Traits;

trait PaginationDto
{
    public ?int $perPage;
    public ?int $page ;

    public function getPerPage(): int
    {
        return $this->perPage ?? 10;
    }

    public function setPerPage(?int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function getPage(): int
    {
        return $this->page ?? 1;
    }

    public function setPage(?int $page): self
    {
        $this->page = $page;
        return $this;
    }


}
