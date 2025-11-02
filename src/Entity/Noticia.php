<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NoticiaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoticiaRepository::class)]
#[ApiResource]
class Noticia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Categoria>
     */
    #[ORM\ManyToMany(targetEntity: Categoria::class, inversedBy: 'noticias')]
    private Collection $categoria;

    #[ORM\Column(length: 500)]
    private ?string $titulo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $conteudo = null;

    #[ORM\Column]
    private ?\DateTime $dataPublicacao = null;

    #[ORM\Column(length: 1000)]
    private ?string $destaque = null;

    #[ORM\ManyToOne(inversedBy: 'noticias')]
    private ?MediaObject $imagemDestaque = null;

    public function __construct()
    {
        $this->categoria = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Categoria>
     */
    public function getCategoria(): Collection
    {
        return $this->categoria;
    }

    public function addCategorium(Categoria $categorium): static
    {
        if (!$this->categoria->contains($categorium)) {
            $this->categoria->add($categorium);
        }

        return $this;
    }

    public function removeCategorium(Categoria $categorium): static
    {
        $this->categoria->removeElement($categorium);

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    public function setConteudo(string $conteudo): static
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    public function getDataPublicacao(): ?\DateTime
    {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao(\DateTime $dataPublicacao): static
    {
        $this->dataPublicacao = $dataPublicacao;

        return $this;
    }

    public function getDestaque(): ?string
    {
        return $this->destaque;
    }

    public function setDestaque(string $destaque): static
    {
        $this->destaque = $destaque;

        return $this;
    }

    public function getImagemDestaque(): ?MediaObject
    {
        return $this->imagemDestaque;
    }

    public function setImagemDestaque(?MediaObject $imagemDestaque): static
    {
        $this->imagemDestaque = $imagemDestaque;

        return $this;
    }
}
