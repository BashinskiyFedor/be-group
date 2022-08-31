<?php

namespace App\Infrastructure\DTO;

use DateTime;

class CategoryDto extends RequestDto
{
    public int $id;
    public string $name;
    public string $description;
    public DateTime $createdDate;
    public bool $active;
}
