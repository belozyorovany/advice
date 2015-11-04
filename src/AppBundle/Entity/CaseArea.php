<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;

/**
 * CaseArea
 */
class CaseArea
{
    const SERVER_PATH_TO_IMAGE_FOLDER = 'uploads/casearea/';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $preview;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $button_title;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var integer
     */
    private $weight;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CaseArea
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return CaseArea
     */
    public function setIcon(UploadedFile $icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set preview
     *
     * @param string $preview
     * @return CaseArea
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Get preview
     *
     * @return string 
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CaseArea
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set button_title
     *
     * @param string $buttonTitle
     * @return CaseArea
     */
    public function setButtonTitle($buttonTitle)
    {
        $this->button_title = $buttonTitle;

        return $this;
    }

    /**
     * Get button_title
     *
     * @return string 
     */
    public function getButtonTitle()
    {
        return $this->button_title;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return CaseArea
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return CaseArea
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and target filename as params
        $this->getFile()->move(
            Line::SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getFile()->getClientOriginalName()
        );
        // set the path property to the filename where you've saved the file
        $this->icon = $this->getFile()->getClientOriginalName();
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated() {
        $this->setUpdated(new \DateTime("now"));
    }

    public function getWebPath() {
        return Line::SERVER_PATH_TO_IMAGE_FOLDER . $this->getIcon();
    }

    /**
     * @var boolean
     */
    private $active;


    /**
     * Set active
     *
     * @param boolean $active
     * @return CaseArea
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}
