<?php

namespace App\Traits;


trait Trans
{
   public function getTransNameAttribute()
   {
      $name = json_decode($this->name, true);
      if (is_array($name) && array_key_exists(app()->currentLocale(), $name)) {
         return $name[app()->currentLocale()];
      }
      return $this->name;
   }


   public function getNameEnAttribute()
   {

      $name = json_decode($this->name, true);

      if (is_array($name) && isset($name['en'])) {
         return $name['en'];
      }

      return '';
   }

   public function getNameArAttribute()
   {
      $name = json_decode($this->name, true);

      if (is_array($name) && isset($name['ar'])) {
         return $name['ar'];
      }

      return '';
   }
   public function getTransDescriptionAttribute()
   {
      $description = json_decode($this->description, true);
      if (is_array($description) && array_key_exists(app()->currentLocale(), $description)) {
         return $description[app()->currentLocale()];
      }
      return $this->description;
   }


   public function getDescriptionEnAttribute()
   {

      $description = json_decode($this->description, true);

      if (is_array($description) && isset($description['en'])) {
         return $description['en'];
      }

      return '';
   }

   public function getDescriptionArAttribute()
   {
      $description = json_decode($this->description, true);

      if (is_array($description) && isset($description['ar'])) {
         return $description['ar'];
      }

      return '';
   }


   public function getTransContentAttribute()
   {
      $content = json_decode($this->content, true);
      if (is_array($content) && array_key_exists(app()->currentLocale(), $content)) {
         return $content[app()->currentLocale()];
      }
      return $this->content;
   }

   public function getContentEnAttribute()
   {
      $content = json_decode($this->content, true);
      if (is_array($content) && isset($content['en'])) {
         return $content['en'];
      }
      return '';
   }

   public function getContentArAttribute()
   {
      $content = json_decode($this->content, true);
      if (is_array($content) && isset($content['ar'])) {
         return $content['ar'];
      }
      return '';
   }

   public function getTransTitleAttribute()
   {
      $title = json_decode($this->title, true);
      if (is_array($title) && array_key_exists(app()->currentLocale(), $title)) {
         return $title[app()->currentLocale()];
      }
      return $this->title;
   }

   public function getTitleEnAttribute()
   {
      $title = json_decode($this->title, true);
      if (is_array($title) && isset($title['en'])) {
         return $title['en'];
      }
      return '';
   }

   public function getTitleArAttribute()
   {
      $title = json_decode($this->title, true);
      if (is_array($title) && isset($title['ar'])) {
         return $title['ar'];
      }
      return '';
   }

   public function getTransAuthorAttribute()
   {
      $author = json_decode($this->author, true);
      if (is_array($author) && array_key_exists(app()->currentLocale(), $author)) {
         return $author[app()->currentLocale()];
      }
      return $this->author;
   }

   public function getAuthorEnAttribute()
   {
      $author = json_decode($this->author, true);
      if (is_array($author) && isset($author['en'])) {
         return $author['en'];
      }
      return '';
   }

   public function getAuthorArAttribute()
   {
      $author = json_decode($this->author, true);
      if (is_array($author) && isset($author['ar'])) {
         return $author['ar'];
      }
      return '';
   }







   public function getTransDescreptionAttribute()
   {
      $descreption = json_decode($this->descreption, true);
      if (is_array($descreption) && array_key_exists(app()->currentLocale(), $descreption)) {
         return $descreption[app()->currentLocale()];
      }
      return $this->descreption;
   }


   public function getDescreptionEnAttribute()
   {

      $descreption = json_decode($this->descreption, true);

      if (is_array($descreption) && isset($descreption['en'])) {
         return $descreption['en'];
      }

      return '';
   }

   public function getDescreptionArAttribute()
   {
      $descreption = json_decode($this->descreption, true);

      if (is_array($descreption) && isset($descreption['ar'])) {
         return $descreption['ar'];
      }

      return '';
   }
}
