<?php

declare(strict_types=1);

namespace Yiisoft\Definitions\Tests\Support;

final class Phone
{
    /**
     * @var string|null
     */
    private $id;
    /**
     * @var mixed[]
     */
    private $colors;
    /**
     * @var mixed[]
     */
    private $apps = [];
    /**
     * @var string|null
     */
    private $author;
    /**
     * @var string|null
     */
    private $country;

    /**
     * @var bool
     */
    public $dev = false;
    /**
     * @var string|null
     */
    public $codeName;
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $version;

    public function __construct(
        ?string $name = null,
        ?string $version = null,
        ...$colors
    ) {
        $this->name = $name;
        $this->version = $version;
        $this->colors = $colors;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function addApp(string $name, ?string $version = null): void
    {
        $this->apps[] = [$name, $version];
    }

    public function getApps(): array
    {
        return $this->apps;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function setId777(): void
    {
        $this->id = '777';
    }

    public function withAuthor(?string $author): self
    {
        $new = clone $this;
        $new->author = $author;
        return $new;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function withCountry(?string $country): self
    {
        $new = clone $this;
        $new->country = $country;
        return $new;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    private function getCountryPrivate(): ?string
    {
        return $this->country;
    }
}
