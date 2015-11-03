<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;

/**
 * Frame
 */
class Frame
{
    const SERVER_PATH_TO_LOGO_FOLDER = '/uploads/logo/';
    const SERVER_PATH_TO_BANNER_FOLDER = '/uploads/banner/';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $header_banner;

    /**
     * @var string
     */
    private $tagline;

    /**
     * @var string
     */
    private $hello;

    /**
     * @var string
     */
    private $lines_header;

    /**
     * @var string
     */
    private $lines_description;

    /**
     * @var string
     */
    private $case_area_header;

    /**
     * @var string
     */
    private $case_area_description;

    /**
     * @var string
     */
    private $faq_header;

    /**
     * @var string
     */
    private $faq_description;

    /**
     * @var string
     */
    private $contacts_header;

    /**
     * @var string
     */
    private $contacts_description;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $map;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $vk;

    /**
     * @var string
     */
    private $fb;

    /**
     * @var boolean
     */
    private $active;


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
     * Set logo
     *
     * @param string $logo
     * @return Frame
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set header_banner
     *
     * @param string $headerBanner
     * @return Frame
     */
    public function setHeaderBanner($headerBanner)
    {
        $this->header_banner = $headerBanner;

        return $this;
    }

    /**
     * Get header_banner
     *
     * @return string 
     */
    public function getHeaderBanner()
    {
        return $this->header_banner;
    }

    /**
     * Set tagline
     *
     * @param string $tagline
     * @return Frame
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get tagline
     *
     * @return string 
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * Set hello
     *
     * @param string $hello
     * @return Frame
     */
    public function setHello($hello)
    {
        $this->hello = $hello;

        return $this;
    }

    /**
     * Get hello
     *
     * @return string 
     */
    public function getHello()
    {
        return $this->hello;
    }

    /**
     * Set lines_header
     *
     * @param string $linesHeader
     * @return Frame
     */
    public function setLinesHeader($linesHeader)
    {
        $this->lines_header = $linesHeader;

        return $this;
    }

    /**
     * Get lines_header
     *
     * @return string 
     */
    public function getLinesHeader()
    {
        return $this->lines_header;
    }

    /**
     * Set lines_description
     *
     * @param string $linesDescription
     * @return Frame
     */
    public function setLinesDescription($linesDescription)
    {
        $this->lines_description = $linesDescription;

        return $this;
    }

    /**
     * Get lines_description
     *
     * @return string 
     */
    public function getLinesDescription()
    {
        return $this->lines_description;
    }

    /**
     * Set case_area_header
     *
     * @param string $caseAreaHeader
     * @return Frame
     */
    public function setCaseAreaHeader($caseAreaHeader)
    {
        $this->case_area_header = $caseAreaHeader;

        return $this;
    }

    /**
     * Get case_area_header
     *
     * @return string 
     */
    public function getCaseAreaHeader()
    {
        return $this->case_area_header;
    }

    /**
     * Set case_area_description
     *
     * @param string $caseAreaDescription
     * @return Frame
     */
    public function setCaseAreaDescription($caseAreaDescription)
    {
        $this->case_area_description = $caseAreaDescription;

        return $this;
    }

    /**
     * Get case_area_description
     *
     * @return string 
     */
    public function getCaseAreaDescription()
    {
        return $this->case_area_description;
    }

    /**
     * Set faq_header
     *
     * @param string $faqHeader
     * @return Frame
     */
    public function setFaqHeader($faqHeader)
    {
        $this->faq_header = $faqHeader;

        return $this;
    }

    /**
     * Get faq_header
     *
     * @return string 
     */
    public function getFaqHeader()
    {
        return $this->faq_header;
    }

    /**
     * Set faq_description
     *
     * @param string $faqDescription
     * @return Frame
     */
    public function setFaqDescription($faqDescription)
    {
        $this->faq_description = $faqDescription;

        return $this;
    }

    /**
     * Get faq_description
     *
     * @return string 
     */
    public function getFaqDescription()
    {
        return $this->faq_description;
    }

    /**
     * Set contacts_header
     *
     * @param string $contactsHeader
     * @return Frame
     */
    public function setContactsHeader($contactsHeader)
    {
        $this->contacts_header = $contactsHeader;

        return $this;
    }

    /**
     * Get contacts_header
     *
     * @return string 
     */
    public function getContactsHeader()
    {
        return $this->contacts_header;
    }

    /**
     * Set contacts_description
     *
     * @param string $contactsDescription
     * @return Frame
     */
    public function setContactsDescription($contactsDescription)
    {
        $this->contacts_description = $contactsDescription;

        return $this;
    }

    /**
     * Get contacts_description
     *
     * @return string 
     */
    public function getContactsDescription()
    {
        return $this->contacts_description;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Frame
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set map
     *
     * @param string $map
     * @return Frame
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return string 
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Frame
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Frame
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set vk
     *
     * @param string $vk
     * @return Frame
     */
    public function setVk($vk)
    {
        $this->vk = $vk;

        return $this;
    }

    /**
     * Get vk
     *
     * @return string 
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * Set fb
     *
     * @param string $fb
     * @return Frame
     */
    public function setFb($fb)
    {
        $this->fb = $fb;

        return $this;
    }

    /**
     * Get fb
     *
     * @return string 
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Frame
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
    private $file1;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile1(UploadedFile $file = null)
    {
        $this->file1 = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * Unmapped property to handle file uploads
     */
    private $file2;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile2(UploadedFile $file = null)
    {
        $this->file2 = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile1()) {
            return;
        }
        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and target filename as params
        $this->getFile1()->move(
            Frame::SERVER_PATH_TO_LOGO_FOLDER,
            $this->getFile1()->getClientOriginalName()
        );
        // set the path property to the filename where you've saved the file
        $this->logo = $this->getFile1()->getClientOriginalName();
        // clean up the file property as you won't need it anymore
        $this->setFile1(null);

        // the file property can be empty if the field is not required
        if (null === $this->getFile2()) {
            return;
        }
        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and target filename as params
        $this->getFile2()->move(
            Frame::SERVER_PATH_TO_BANNER_FOLDER,
            $this->getFile2()->getClientOriginalName()
        );
        // set the path property to the filename where you've saved the file
        $this->header_banner = $this->getFile2()->getClientOriginalName();
        // clean up the file property as you won't need it anymore
        $this->setFile2(null);
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated() {
        $this->setUpdated(new \DateTime("now"));
    }

    public function getWebPathLogo() {
        return Frame::SERVER_PATH_TO_LOGO_FOLDER . $this->getLogo();
    }

    public function getWebPathHeaderBanner() {
        return Frame::SERVER_PATH_TO_BANNER_FOLDER . $this->getHeaderBanner();
    }


    /**
     * @var \DateTime
     */
    private $updated;


    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Frame
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
}
