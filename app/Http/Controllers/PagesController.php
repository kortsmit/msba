<?php

namespace App\Http\Controllers;

use League\CommonMark\Converter;

class PagesController extends Controller
{
    protected $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Create the home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Create the workshop notes page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notes()
    {
        $notes = $this->parseMarkdown();

        return view('notes', ['notes' => $notes]);
    }

    /**
     * Parses the workshop notes markdown.
     *
     * @return string
     */
    public function parseMarkdown(): string
    {
        return $this->converter->convertToHtml($this->markdown());
    }

    /**
     * Returns the markdown to be parsed .
     *
     * @return string
     */
    public function markdown(): string
    {
        return "
# GIT

## Part 1 - Configuration

1. Does everyone have GIT installed and Git Bash available? GitHub Desktop?
    - [Git Download](https://git-scm.com/downloads)
    - [GitHub Desktop](https://desktop.github.com/)
2. Configuration steps:
```
git config --global user.name 'Tim Kortsmit'
git config --global user.email 'tim@kortsmit.com'
git config --global core.editor 'subl -n -w'
git config --list
```

## Part 2 - Basic Changes:

For all of the basics steps in working with GitHub, we will quickly go 
through and create a repository and work through a few example changes 
and commits. These are some of the most common commands that you will be 
using if you work with GIT on a day to day basis.

1. At any time, you can run `git --help` to get an exact list of commands available 
    or `git help [command]` to get even more information about a specific command
2. `code` to switch to my workspace where I keep my GIT repositories
3. `mkdir github-workshop` to create a new folder
4. `cd github-workshop` to switch into it
5. `touch file1.txt file2.txt file3.txt` to quickly create a few files in the folder 
6. `git init` to initialize the folder as a git repository. This created a hidden `.git` 
    folder that is used as a form of database to keep track of the GIT repository.
    If you ran this somewhere by accident or would like to remove GIT from a project,
    simply delete the .git directory.
7. `git status` to view the current state of the repository
8. `git add .` to add all of these files and run `git status` again to view the changes
9. `git commit -m 'Initial commit'` to create our initial commit
10. `date >> file1.txt` to add some content to one of the files
11. `git add -p` for an interactive approach to adding files, which will let you 
    check the changes prior to staging them
```
y - stage this hunk
n - do not stage this hunk
q - quit; do not stage this hunk or any of the remaining ones
a - stage this hunk and all later hunks in the file
d - do not stage this hunk or any of the later hunks in the file
/ - search for a hunk matching the given regex
e - manually edit the current hunk
? - print help
```
12. `git commit -m 'Add date to file 1'` It is important to always keep your message 
    short but descriptive. Think subject, body and possibly a conclusion if an issue
    is resolved or closed.
13. `git rm file3.txt` to remove a file. With a `git status` you can see that this
    change has been immediately staged.
14. `git commit -m 'Removing file 3'

## Part 3 - Looking at Project History

The power of Git starts becoming clear when you start looking at the history of files 
and your project. Some quick example commands:

1. `git log` to view the log of commits on your current branch. We will cover branching 
    later when we discuss workflows.
2. `git log --oneline` For when you are looking at a number of different commits. 
    As you can see, short but descriptive message can become quite important when you 
    have a long history.
3. `git log --graph` to view as a branched structure
4. `git show` is very similar to `git log` but also outputs the changes that were done. 
    Also, by default, it only shows the most recent commit. Git show is great to view 
    information about one single commit.
4. As an example, let me run `git log --oneline --graph` on the 
   [MSBA](https://github.com/kortsmit/msba) project we'll look at later in the workshop.
5. `git diff SHA` is incredibly useful to view differences between files. You can pass a 
    specific commit SHA in order to compare with the current commit. Or, you can pass two 
    commits to compare by passing the two SHAs separated by two periods such as
    `git diff SHA1..SHA2`. Tab auto-completion is very useful for this command as well, 
    as it will provide your history for you, which makes it easier to select a commit SHA.

## Part 4 - Pushing to GitHub

If we had more time, I would have covered this later, but I wanted to make sure 
we covered pushing up to GitHub as getting your projects to GitHub is the goal of 
this workshop. If you have not already pushed your project to GitHub, feel free to
switch to the project now. Keep in mind, if you have not already done so, you will have to 
initialize it as a GIT repository and create an initial commit on the master branch.

1. First, we'll go to GitHub and create a new repository
2. Now, lets create a `readme.md` markdown file in the main project directory: 
   `touch readme.md`
3. Now edit it and create a brief description of the project we are working on:
   I'll open it with Sublime Text `subl readme.md`, but feel free to use whatever
   you prefer.
4. Most of you will want to use HTTPS, which you can set using 
   `git remote add origin https://github.com/USERNAME/REPOSITORY.git`.
    Personally, I prefer to use SSH, so I will use
   `git remote add origin git@github.com:USERNAME/REPOSITORY.git`.
   If you know you've configured SSH keys, feel free to use SSH as well.
   In case you made a mistake and need to change it, the command is very similar:
   `git remote set-url origin https://github.com/USERNAME/REPOSITORY.git`
5. You can verify if this is set correctly by running `git remote -v`
6. Now, we'll have to set the upstream branch for our local one:
   `git push --set-upstream origin master`. If you are using SSH keys, it'll push the code 
   right up to the repository. If you're using HTTPS, you'll have to provide your
   GitHub account credentials. If you have two factor authentication enabled, you'll
   need to provide the current token instead of your account password.
7. Now, lets go back to the GitHub repository we created and refresh. Our master branch
   should now be available there.
8. Now that we have a repository and branch pushed to GitHub, we'll come back to 
   working with GitHub later.

## Part 5 - Separating Work

Think of GIT as a tree with the master branch being the main trunk. And workflow essentially 
means to use branches in GIT that branch or separate your work from that trunk.

1. `git status` will always indicate what branch you are current on, if you do not have your 
    terminal configured similar to mine.
2. `git branch` without parameters allows you to view all local branches and 
    `git branch -a` allows you to also view remote branches that are not cloned to your 
    local repository. The * indicates what branch you are currently on.
3. `git branch branch-1` and `git branch branch-2` to create a few branches. These will be 
    based on the current commit of the branch that you are on, so be sure to know what your 
    starting point is when creating a new branch. Branches are great to keep work separate. 
    A good rule of thumb is to branch early and to branch often. Branching in GIT is 
    incredibly light weight, as only changes are tracked.
4. `git branch delete-this` and then you can delete the branch by using 
    `git branch -d delete-this`. Please note that you can not delete the 
    branch you are current on.
5. `git log --oneline --decorate -a`: you can see that all of branches are currently at 
    the same exact commit. For reference, `HEAD` always indicates the most recent commit 
    for the branch you are currently on.
6. 'git checkout branch-1' to check out one of the branches we created earlier to do work 
    on. This works for both local and remote branches. Your entire local repository will
    change to reflect the current state of the branch. This 
7. Another option would have been to run `git checkout -b branch-3`, which will create
    branch-3 and check it out immediately. Most times, you are creating a new branch to 
    start doing work on, so this is my personal preferred way of creating new branches.
8. `date >> file2.txt` to make some quick edits
9. `git add .` and `git commit -m 'Add date to file 2'
10. `git log --oneline --decorate -a`: you can now see that branch-3 is ahead of the 
    other branches
11. Now, say, we are happy with the changes we've made on `branch-3` and we'd like to 
    bring those changes into the `master` branch: `git checkout master` and then we'll 
    `git merge branch-1`
12. `git log --oneline --decorate -a`: if we run git log again, you can now see that 
    master and branch-3 are now at the same commit, while branch-1 and branch-2 are 
    now behind.
13. You can check out a previous commit using `git checkout SHA`. You will note that 
    by doing this, you might have a detached HEAD. All this means is that you are on 
    a commit that does not have a branch associated with it. This option is great 
    if you want to look around a specific previous commit. For example, a new bug 
    has popped up and you know that the functionality was working in a previous 
    version. By checking out a previous commit, you'll be able to browse around and 
    take a look at it.

## Part 6 - Working With a Team

1. In order to get started with an existing repository, you can use the `git clone`
   command to pull it down into a local repository. For example, lets clone the 
   MSBA repository into a new directory: `git clone git@github.com:kortsmit/msba.git`
   and then `cd msba` into it.
2. You can use `git branch -a` to view a list of all branches, both local and remote.
3. Setting up a `.gitignore` file can be very useful if you're working with 
   editors or have specific files that you would prefer to keep out of the repository.
   For example, much of my work is done using PHPStorm as my code IDE. For each
   project, PHPStorm keeps track of my personal preferences in a .idea directory.
   Since I do not want to force my team to use those preferences, I add it to the 
   project .ignore file. Another reason is that you never want to include credentials 
   or any other sensitive information on your repositories themselves. For our 
   internal work, we keep specific environment files that hold these credentials, 
   which are also ignored. You can use patterns or entire directories in this file. 
   You can store gitignore files in different directories as well; you're not limited 
   to a single file.
4. If you are working with multiple different people or from different computers,
   there is a good chance that your local repository will get out of sync with the 
   remote GitHub repository. You can use `git fetch` to download all of the new
   work on the remote repository. You should note that `git fetch` only downloads
   the work from the remote repository, it does not update your local repository.
   It's a good way to determine if your local copy is out of sync. Keep in mind, 
   even if you do out of sync work, GIT still protects you and basically forces
   you to merge in the remote work before you can push your own work.
5. To update your local repository, you can `git pull` changes to your local
   repository. Effectively, this command runs both `git fetch` and `git merge`
   together.

# GitHub

## Pull Requests

Pull requests can be used when working with a team as a form of review step to test 
and review new features. 

## Issues

Issues can be used for many things such as tasks, bug reports or just to discuss certain 
topics or proposals for making changes to the project.

1. Lets look at a few quick examples on the 
   [kortsmit/msba](https://github.com/kortsmit/msba) repository.

## Projects

Projects allow you to organize the work you are doing in a form of simple project
management, using GitHub's issues and pull requests. For example, you can see on the
[kortsmit/msba](https://github.com/kortsmit/msba) repository's project page.

## Wiki

On the wiki, you can use markdown to write documentation for the project. You can
create new pages just by linking to them. For example, lets edit the home page I already
created and add one more page. The path of the URL is case sensitive, and dashes are used
to denote spaces in the new page's name.

## Forking

Basically, to fork a project just means that you are bringing a copy of it into your own
GitHub account. From there, you can do anything you want with it without being restricted
by the security settings of the original version. As an example, this is
commonly used in Open Source development. Developers will fork a project to their own
account, make the changes they would like to see in the original open source project and
then create a pull request from their forked version back into the original. At that time,
it is up to the project maintainer to decide if they want to include the changes into the 
project or not.

## Adding a Project License

To make it clear how you would like people to use your project, you will want to specify
what type of license it has. The simplest way to add one would be to go to your master
branch on GitHub, click on 'Create new file' and for the filename, type 'LICENSE.md'.
An option on the right will appear that allows you to choose a license template. This
is a great feature as it gives more information about what the license does and does 
not allow. For example, I've applied the MIT license to the repository for this workshop 
so that anyone can do anything they want with it, but there is no liability or warranty
provided.

# Advanced Workflow

While we do not have time to go over more advanced work, I wanted to show some very 
quick examples of what can be done when combining GIT, GitHub and other continuous 
integration tools.

1. Earlier, we talked about keeping the master branch stable and clean. For our my 
   team's workflow, we protect both the master and develop branches on GitHub.
2. By protecting it, it becomes impossible to directly merge or push to the branch.
3. The only way to bring changes into protected GitHub branches is to use a pull 
   request. Effectively, this starts a review process before any changes 
4. As an example, let me show you why we might do that using a different project I
   prepared for this workshop: [kortsmit/msba](https://github.com/kortsmit/msba)

## Branching Workflows

A great explanation of the GitFlow model we use at UniPro for our development 
can be accessed at 
[http://nvie.com/posts/a-successful-git-branching-model/](http://nvie.com/posts/a-successful-git-branching-model/).

# Options for Advanced Examples

If time allows, here are a few examples that might be good to demonstrate as well:

## Merge Conflicts

If you are the only one working on a project, this might not happen too frequently.
However, working as a team you will encounter this sometimes.

## Rebase

Rebase can be used to bring a stale branch back up to date. For example, lets imagine
you started a feature quite a while ago but then something else took priority. Now, you 
are ready to get back to developing this new feature. GIT rebase will help you bring 
this branch back up to date.

You can also use GIT rebase to clean up a set of commits. For example, you might have
made multiple commits while doing your work that might be able to be combined into a 
single commit in order to keep your history clean.

## Cherry Pick

GIT cherry-pick allows you to take a specific commit from another branch and add it 
to your current one without merging in all other changes from that branch. You can also
cherry pick multiple commits without having to pick them one at a time. I should note
that most likely, you will not need this frequently. Personally, I've only used it on a 
few instances, but it is good to be aware of when the need does arise.

1. `git cherry-pick SHA` and pass it the commit's SHA that you are trying to add to 
   your current branch.

# Useful Links

Here are a few useful links as you start using both GIT and GitHub more:

1. [Student Developer Pack](https://education.github.com/pack)
2. [Blog post explaining the GitFlow branching model](http://nvie.com/posts/a-successful-git-branching-model/)
3. [GitHub Desktop](https://desktop.github.com/)

# Questions

Here are a few ways to reach me:

1. [tim@kortsmit.com](mailto:tim@kortsmit.com)
2. [GitHub](https://github.com/kortsmit)
3. [LinkedIn](https://www.linkedin.com/in/kortsmit/)
4. [Twitter](https://twitter.com/kortsmit)
        ";
    }
}
