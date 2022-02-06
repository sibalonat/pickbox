<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About PickBox
CKEMI Githubers.
Again, something quite fancy and interesting.
So below youll find what this is has installed.

Major Credits before hand to ##CodeCourse. Ive been so much eager to learn more about polymorphic and this really cleared out the pollution out the air. 

## polymorphysm in LARAVEL

So first about morphTo. Laravel has been quite on the cutting edge of technologies, and usually those that requires custom build solution. What i have been quite amazed about Laravel since early on, was support for polymorphic relations. 
Ive been working with a lot of people from different backgrounds, and what i have come to realise is that you may be as vanilla as you want when it comes to PHP but is solutions and methodologies are not easy to grasp youll make little to no effort to learn new things, even if those are definetely quite impressive and edge cutting such as polymorphic relations. Ive come across polymorphism mostly due to Spatie Media Library Package. The Belgian Development agency with lots of Github stars and  (package downloads). So i was fascinated on how simpler, to later extensive pivot tables can be translated into much simpler ones, just a middle table for all the interactions betweens not just two tables, but enourmeous number of such. Spatie for example hooks up different models, by that posts, articles, videos, product, or anything, and for each of them, it not only offers a solution to actually store the media in any type of disk, be that, local, s3, or even you google photos(this last was a joke), but it also gives you the ability that calling a trait into each model, it automatically will know that model has a polymorphic association the media object of spatie media library. So in a way you can avoid making a table for each media object or avoid having a column with media object. 

So polymorphism. And Laravel has gone to somehow implementing this db feature design, to actually added to the base functionality and emphasize it in the last two versions. 

Well i have been using spatie media library for quite sometime. And for most cases it works like a charm. It hooks data, stores them connect them to a middle table with all the models associated with medias there. And also has some run commands to clear up some of the storage for your application. But there is something that i can point the finger on, but there is something that i really didnt quite got into a last project i was working, and it put into a a difficult spot-on event type of situation. I was therefore to default to other rather weird and almost absene solution to have two types of media, that didnt quite destroy one another when the other was not updating. Later i figured that that may be a bit me, on the javascript part, but still im pretty sure that if i make this change i will default again to this weird solution that i really didnt know what to make with them. 

I then saw Alex making a DropBox Clone and there i really got everything from polymorphic and media type. 

# Livewire
Huge fan of Livewire. Thats a fact.

# media with FilePond
FilePond hasnt been quite the choice in other pas project but understanding the methods it uses, and its easy integration with Alpine, will be probably my go to place now. In the File-Browser in views/livewire:

- it hooks the media into a temporary folder handled by livewire. 
- it then stores this media, into a file name property as a path into a folder called files, and persisted into the db.
- it allows cancel the upload.
- it removes the files after being uploaded.
- it closes the modal.


**[medialibrary as it should]**

## The ancestors Property
In most cases, especially in the past i have been relying to much on crud solutions. Or the mantra, if it works, leave it - or just LEAVEIT

For Breacrumbs ive used 
staudenmeir/laravel-adjacency-list
[staudenmeir]**[/laravel-adjacency-list]**

# Some context
so when it came to breadcrumbs in the past i have just aplied crude solutions, and when things get slitly more complicated after the first release i would just just set some methods about each ancestor and self on my own. This therefore requires time. Because each project is different and sometimes not very easy to apply the same methods. Even for this one, i had to make a slight change. In most cases for Laravel i use Laragon for development environment. I know for a fact that valet is very much easier and makes more sens, but i dont know its just a force of habit i think. But for example one of the configuratin i do everytime in my db choice is not using heidy that commes with mariadb, but phpmyadmin, since it offers slitly better universal export files in my experience. 
In the case of making your own methods it offers you more flexibility becuase you know if something would work on your development environment. But that requires time. Sometime, a time that is difficult to justify when you need to work on something and have it release asap.
In my case i know by fact that if for any reason my workplace uses mysql 5.1 and not higher for legacy purposes i couldnt have used this package. But i could at least have tried to see if there are any ramifications. If not i would definetely. But my environment since legacy purposes requires me to work sometimes with projects that are quite old and the db is old, i had to use 5.1. And with that version the package didnt work. I had then to switch to mariadb the latest, and then i was working like a charm. But really sometimes i ought, but probably everyone ouught as well, read the base requirements.    


## Laravel Scouts
I know by fact that i didnt to use laravel scouts on this, because livewire has some really neat functionality when it comes to search. But i was curios. It took me a bit 30 minutes time to set-it-up but then somehow it was worth it. I dont know for sure. But the methods could very well exported to livewire functionality without the driver for searching.

package - [teamtnt/laravel-scout-tntsearch-driver"]


## JetStream
Last but not least, JetStream, or part of the family of TALL.
It offers great functionality out the box, such as team managment, user managment.
Great suport for Livewire(Alpine) or Innertia(VueJS)
But lots more to be striped and shape by yourself. 


- Dowload
- composer install
- php artisan key:generate
- php artisan storage:link
- create db name and password
- php artisan migrate
- register and see what's in there


These are my suggestions. 


## License

pickbBox is bassed on LARAVEL and is Free to use, under [Creative Commons 4.0](https://creativecommons.org/licenses/by/4.0/) **[thank me, somewhere, its fair]** and [MIT license](https://opensource.org/licenses/MIT).
