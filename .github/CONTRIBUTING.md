# Sunny Socks team Git guide

Keep main working. Create a new branch for each task, push to that branch, and open a pull request into main. Manyosz reviews and merges team changes. Branches do not prevent conflicts: coordinate when editing the same files.

## First-time setup

Replace the example identity with your own GitHub name and email.

```bash
git config --global user.name "Your Name"
git config --global user.email "YOUR_GITHUB_EMAIL"
git clone https://github.com/Manyosz/Group-1A-Sunny-Socks.git
cd Group-1A-Sunny-Socks
```

For a private repository, accept your collaborator invitation and authenticate with GitHub when prompted. Use GitHub's browser authentication or a credential manager rather than your account password for Git operations.

## Start each task

Commit your current work before switching branches. Replace alex/homepage with your name and task.

```bash
git switch main
git pull --ff-only origin main
git switch -c alex/homepage
```

## Commit and push

Replace path/to/file with an actual changed file. Repeat git add for additional files. Review the staged changes before committing.

```bash
git status
git diff
git add path/to/file
git diff --cached
git commit -m "Build homepage layout"
git push -u origin alex/homepage
```

Later commits on this branch use the same add and commit steps, followed by git push. Never commit passwords, API keys, or .env files.

## Open a pull request

On GitHub, select Compare & pull request. Set the base branch to main and the compare branch to your task branch. Describe the changes and checks, then request review from Manyosz. Further pushes to the same branch update the existing pull request.

## Update your branch and resolve conflicts

With your work committed and your task branch checked out:

```bash
git fetch origin
git merge origin/main
```

If there are conflicts, open each affected file. Choose the correct final code and remove the <<<<<<<, =======, and >>>>>>> markers. Then stage the resolved files and finish the merge:

```bash
git add path/to/resolved-file
git commit -m "Resolve conflicts with main"
git push
```

If the merge succeeds without conflicts, just push. Check the website after merging main into your branch. To cancel an in-progress merge, use git merge --abort.

## After your pull request is merged

Start the next task from main, using a new branch name:

```bash
git switch main
git pull --ff-only origin main
git switch -c alex/next-task
```

## Review policy

The intended main branch protection requires a pull request, one approving review, code owner review, dismissal of stale approvals, and resolved review conversations. Force pushes and branch deletion are blocked. CODEOWNERS only enforces review when the corresponding branch protection is enabled.

Manyosz cannot approve their own pull request. Changes authored by Manyosz need another eligible reviewer and an explicitly chosen review policy; do not casually bypass protections. Required build checks should be enabled once the repository's actual build workflow is identified.
