<?php

namespace App\Entity;

use App\Repository\ReportingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportingRepository::class)]
class Reporting
{
    const RESOURCE_KEY = 'reportings';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column]
    private ?bool $closing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 3)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $source = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $other_source = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $info_type_requested = null;

    #[ORM\Column(nullable: true)]
    private ?bool $codaf = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codaf_dpt = null;

    #[ORM\Column]
    private ?bool $person = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nir = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $married_name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $birthplace = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deathday = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $last_known_address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lodging = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gsm = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $familly_situation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $situation_since = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $married_nir = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $married_birthname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $married_lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $married_firstname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $children = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pro_situation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pro_situation_other = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resources_origin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resources_origin_other = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $loss_amount = null;

    #[ORM\Column(nullable: true)]
    private ?float $loss_real = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $loss_from = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $loss_to = null;

    #[ORM\Column(nullable: true)]
    private ?float $loss_avoided = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $appendices = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $social_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commercial_name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $activity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closure_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $rj_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lj_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $company_address = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pro_management_period_from1 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pro_management_period_to1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pro_management_name1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pro_management_address1 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pro_management_period_from2 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $pro_management_period_to2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pro_management_name2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $pro_management_address2 = null;

    #[ORM\ManyToOne]
    private ?User $author = null;

    #[ORM\ManyToOne]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isClosing(): ?bool
    {
        return $this->closing;
    }

    public function setClosing(bool $closing): self
    {
        $this->closing = $closing;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getOtherSource(): ?string
    {
        return $this->other_source;
    }

    public function setOtherSource(?string $other_source): self
    {
        $this->other_source = $other_source;

        return $this;
    }

    public function getInfoTypeRequested(): ?string
    {
        return $this->info_type_requested;
    }

    public function setInfoTypeRequested(string $info_type_requested): self
    {
        $this->info_type_requested = $info_type_requested;

        return $this;
    }

    public function isCodaf(): ?bool
    {
        return $this->codaf;
    }

    public function setCodaf(?bool $codaf): self
    {
        $this->codaf = $codaf;

        return $this;
    }

    public function getCodafDpt(): ?string
    {
        return $this->codaf_dpt;
    }

    public function setCodafDpt(?string $codaf_dpt): self
    {
        $this->codaf_dpt = $codaf_dpt;

        return $this;
    }

    public function isPerson(): ?bool
    {
        return $this->person;
    }

    public function setPerson(bool $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getNir(): ?string
    {
        return $this->nir;
    }

    public function setNir(?string $nir): self
    {
        $this->nir = $nir;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getMarriedName(): ?string
    {
        return $this->married_name;
    }

    public function setMarriedName(?string $married_name): self
    {
        $this->married_name = $married_name;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(?string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    public function getDeathday(): ?\DateTimeInterface
    {
        return $this->deathday;
    }

    public function setDeathday(?\DateTimeInterface $deathday): self
    {
        $this->deathday = $deathday;

        return $this;
    }

    public function getLastKnownaddress(): ?string
    {
        return $this->last_known_address;
    }

    public function setLastKnownaddress(?string $last_known_address): self
    {
        $this->last_known_address = $last_known_address;

        return $this;
    }

    public function getLodging(): ?string
    {
        return $this->lodging;
    }

    public function setLodging(?string $lodging): self
    {
        $this->lodging = $lodging;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(?string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFamillySituation(): ?string
    {
        return $this->familly_situation;
    }

    public function setFamillySituation(?string $familly_situation): self
    {
        $this->familly_situation = $familly_situation;

        return $this;
    }

    public function getSituationSince(): ?\DateTimeInterface
    {
        return $this->situation_since;
    }

    public function setSituationSince(?\DateTimeInterface $situation_since): self
    {
        $this->situation_since = $situation_since;

        return $this;
    }

    public function getMarriedNir(): ?string
    {
        return $this->married_nir;
    }

    public function setMarriedNir(?string $married_nir): self
    {
        $this->married_nir = $married_nir;

        return $this;
    }

    public function getMarriedBirthname(): ?string
    {
        return $this->married_birthname;
    }

    public function setMarriedBirthname(?string $married_birthname): self
    {
        $this->married_birthname = $married_birthname;

        return $this;
    }

    public function getMarriedLastname(): ?string
    {
        return $this->married_lastname;
    }

    public function setMarriedLastname(?string $married_lastname): self
    {
        $this->married_lastname = $married_lastname;

        return $this;
    }

    public function getMarriedFirstname(): ?string
    {
        return $this->married_firstname;
    }

    public function setMarriedFirstname(?string $married_firstname): self
    {
        $this->married_firstname = $married_firstname;

        return $this;
    }

    public function getChildren(): ?string
    {
        return $this->children;
    }

    public function setChildren(?string $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getProSituation(): ?string
    {
        return $this->pro_situation;
    }

    public function setProSituation(?string $pro_situation): self
    {
        $this->pro_situation = $pro_situation;

        return $this;
    }

    public function getProSituationOther(): ?string
    {
        return $this->pro_situation_other;
    }

    public function setProSituationOther(?string $pro_situation_other): self
    {
        $this->pro_situation_other = $pro_situation_other;

        return $this;
    }

    public function getResourcesOrigin(): ?string
    {
        return $this->resources_origin;
    }

    public function setResourcesOrigin(?string $resources_origin): self
    {
        $this->resources_origin = $resources_origin;

        return $this;
    }

    public function getResourcesOriginOther(): ?string
    {
        return $this->resources_origin_other;
    }

    public function setResourcesOriginOther(?string $resources_origin_other): self
    {
        $this->resources_origin_other = $resources_origin_other;

        return $this;
    }

    public function getLossAmount(): ?string
    {
        return $this->loss_amount;
    }

    public function setLossAmount(?string $loss_amount): self
    {
        $this->loss_amount = $loss_amount;

        return $this;
    }

    public function getLossReal(): ?float
    {
        return $this->loss_real;
    }

    public function setLossReal(?float $loss_real): self
    {
        $this->loss_real = $loss_real;

        return $this;
    }

    public function getLossFrom(): ?\DateTimeInterface
    {
        return $this->loss_from;
    }

    public function setLossFrom(?\DateTimeInterface $loss_from): self
    {
        $this->loss_from = $loss_from;

        return $this;
    }

    public function getLossTo(): ?\DateTimeInterface
    {
        return $this->loss_to;
    }

    public function setLossTo(?\DateTimeInterface $loss_to): self
    {
        $this->loss_to = $loss_to;

        return $this;
    }

    public function getLossAvoided(): ?float
    {
        return $this->loss_avoided;
    }

    public function setLossAvoided(?float $loss_avoided): self
    {
        $this->loss_avoided = $loss_avoided;

        return $this;
    }

    public function getAppendices(): ?string
    {
        return $this->appendices;
    }

    public function setAppendices(?string $appendices): self
    {
        $this->appendices = $appendices;

        return $this;
    }

    public function getSocialName(): ?string
    {
        return $this->social_name;
    }

    public function setSocialName(?string $social_name): self
    {
        $this->social_name = $social_name;

        return $this;
    }

    public function getCommercialName(): ?string
    {
        return $this->commercial_name;
    }

    public function setCommercialName(?string $commercial_name): self
    {
        $this->commercial_name = $commercial_name;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(?string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(?\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getClosureDate(): ?\DateTimeInterface
    {
        return $this->closure_date;
    }

    public function setClosureDate(?\DateTimeInterface $closure_date): self
    {
        $this->closure_date = $closure_date;

        return $this;
    }

    public function getRjDate(): ?\DateTimeInterface
    {
        return $this->rj_date;
    }

    public function setRjDate(?\DateTimeInterface $rj_date): self
    {
        $this->rj_date = $rj_date;

        return $this;
    }

    public function getLjDate(): ?\DateTimeInterface
    {
        return $this->lj_date;
    }

    public function setLjDate(?\DateTimeInterface $lj_date): self
    {
        $this->lj_date = $lj_date;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getCompanyAddress(): ?string
    {
        return $this->company_address;
    }

    public function setCompanyAddress(?string $company_address): self
    {
        $this->company_address = $company_address;

        return $this;
    }

    public function getProManagementPeriodFrom1(): ?\DateTimeInterface
    {
        return $this->pro_management_period_from1;
    }

    public function setProManagementPeriodFrom1(?\DateTimeInterface $pro_management_period_from1): self
    {
        $this->pro_management_period_from1 = $pro_management_period_from1;

        return $this;
    }

    public function getProManagementPeriodTo1(): ?\DateTimeInterface
    {
        return $this->pro_management_period_to1;
    }

    public function setProManagementPeriodTo1(?\DateTimeInterface $pro_management_period_to1): self
    {
        $this->pro_management_period_to1 = $pro_management_period_to1;

        return $this;
    }

    public function getProManagementName1(): ?string
    {
        return $this->pro_management_name1;
    }

    public function setProManagementName1(?string $pro_management_name1): self
    {
        $this->pro_management_name1 = $pro_management_name1;

        return $this;
    }

    public function getProManagementAddress1(): ?string
    {
        return $this->pro_management_address1;
    }

    public function setProManagementAddress1(?string $pro_management_address1): self
    {
        $this->pro_management_address1 = $pro_management_address1;

        return $this;
    }

    public function getProManagementPeriodFrom2(): ?\DateTimeInterface
    {
        return $this->pro_management_period_from2;
    }

    public function setProManagementPeriodFrom2(?\DateTimeInterface $pro_management_period_from2): self
    {
        $this->pro_management_period_from2 = $pro_management_period_from2;

        return $this;
    }

    public function getProManagementPeriodTo2(): ?\DateTimeInterface
    {
        return $this->pro_management_period_to2;
    }

    public function setProManagementPeriodTo2(?\DateTimeInterface $pro_management_period_to2): self
    {
        $this->pro_management_period_to2 = $pro_management_period_to2;

        return $this;
    }

    public function getProManagementName2(): ?string
    {
        return $this->pro_management_name2;
    }

    public function setProManagementName2(?string $pro_management_name2): self
    {
        $this->pro_management_name2 = $pro_management_name2;

        return $this;
    }

    public function getProManagementAddress2(): ?string
    {
        return $this->pro_management_address2;
    }

    public function setProManagementAddress2(?string $pro_management_address2): self
    {
        $this->pro_management_address2 = $pro_management_address2;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
