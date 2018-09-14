# wp-firstplugin

git rm -r --cached /var/www/wordpress.loc - удалить файлы из репозитория (переиндексировать)

shift+alt+a - vscode multiline comment
ctrl+shift+a - (ubuntu) vscode multiline comment
alt+

ctrl+shit+/ - idea multiline comment

Edit.UnIndent - Idea
Ctrl+Alt+Shit+[
Ctrl+Alt+Shit+]

Quick Add Next, виділити наступне схоже слово/змінну (IDEA) виділити слово,+ alt+j

shift+alt+up/down - дублировать строку 

ctrl+shift+alt+l - reformat code [(alt+=), aligments]

Ctrl-Shift-U - idea Transform into uppercase / lowercase


alias ll='ls -l'

alias ls='ls -F --color=auto --show-control-chars'


alias st='git status'

alias add='git add .'

alias cm='git commit -m '

alias push='git push -u origin master'

alias pull='git pull'


# nginx configuration for openserver

для версии 1.12, в папке \OSPanel\userdata\config и в файле Nginx-1.12_vhost.conf в location добавить строку, вот так:
location / {
root "%hostdir%";
index index.php index.html index.htm;
error_page 404 /index.php?error=404;
}

error_page 404 /index.php?error=404;

# git

git remote -v

git remote set-url origin *** - добавить

<<<<<<< HEAD
git remote add origin git@github.com:Lysak/webwp.git - working

git remote set-url --delete origin *** - изъять (не работало)

git remote rm NAME ORIGIN - working

git remote rename FROM TO - working
=======
?? git remote set-url --delete origin *** - изъять
git remote rm origin ++
>>>>>>> 14e46daa6e2681bd0bcaac421345d8ab31318d76

git push origin --delete <branchName> - not tested


git update-index --assume-unchanged .gitignore - gitignore добавить в gitignore


=========================
new info
************
git remote add origin git@github.com:User/UserRepo.git
is used to a add a new remote

git remote set-url origin git@github.com:User/UserRepo.git
is used to change the url of an existing remote repository

git push -u origin master
